<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Detail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::join('students', 'transactions.student_id', '=', 'students.id')
            ->select('transactions.*', 'students.name as student_name')
            ->orderBy('transactions.created_at', 'desc')
            ->get();

        return view('dashboard.transaction.index', [
            'title' => 'Daftar Transaksi',
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $books = Book::all();

        return view('dashboard.transaction.create', [
            'title' => 'Tambah Transaksi',
            'students' => $students,
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'book_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        // make a code like YEAR:MONT:DAY
        $code = date('Ymd');
        $code = 'BOOK-' . $code . '-' . $request->student_id;

        $transaction = Transaction::create([
            'student_id' => $request->student_id,
            'code' => $code,
            'amount' => count($request->book_id)
        ]);

        foreach($request->book_id as $book) {
            Detail::create([
                'book_id' => $book,
                'transaction_id' => $transaction->id,
                'amount' => 1,
                'status' => 0,
                'start_at' => $request->start_date,
                'end_at' => $request->end_date
            ]);
        }

        return to_route('dashboard.transaction.index')->with('success', 'Transaction has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        $detail = Detail::where('transaction_id', $id)->get();
        $detail->each->delete();

        return to_route('dashboard.transaction.index')->with('success', 'Transaction has been deleted successfully!');
    }

    public function return(Request $request, string $id) {
        $detail = Detail::where('transaction_id', $id)->get();
        
        foreach($detail as $d) {
            $d->status = 1;
            $d->save();
        }   

        Transaction::where('id', $id)->update([
            'status' => 1
        ]);

        return to_route('dashboard.transaction.index')->with('success', 'Transaction has been returned successfully!');
    }

    public function report()
    {
        $transactions = Transaction::join('students', 'transactions.student_id', '=', 'students.id')
            ->select('transactions.*', 'students.name as student_name')
            ->orderBy('transactions.created_at', 'desc')
            ->get()
            ->map(function ($transaction) {
                // get detail by transaction id
                $detail = Detail::where('transaction_id', $transaction->id)->get();

                return [
                    'id' => $transaction->id,
                    'code' => $transaction->code,
                    'student_name' => $transaction->student_name,
                    'status' => $transaction->status,
                    'amount' => count($detail),
                    'books' => Book::whereIn('id', $detail->pluck('book_id'))->get()
                ];
            });

        return view('dashboard.transaction.report', [
            'transactions' => $transactions
        ]);
    }
}
