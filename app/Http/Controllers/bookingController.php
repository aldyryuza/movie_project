<?php

namespace App\Http\Controllers;

use App\Models\bookingModel;
use App\Models\paymentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.tiket.tiket');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking = DB::table('booking')->join('users', 'booking.id_user', '=', 'users.id')
            ->join('show', 'booking.id_show', '=', 'show.id_show')
            ->join('movie', 'show.id_movie', '=', 'movie.id')
            ->join('payment', 'booking.id', '=', 'payment.id_booking')
            ->get();
        return view('content.payment.listPayment', [
            'booking' => $booking
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'id_show' => '',
            'jumlah_kursi' => '',
            'id_user' => '',
            'id_show_seat' => '',

            'tanggal_pembayaran' => '',
            'jumlah_harga' => '',
            'payment_method' => '',

        ]);
        $audi_seat = $request->id_show_seat;
        $show_id = $request->id_show;


        // dd($show_id);

        bookingModel::create([
            'id_show' => $request->id_show,
            'jumlah_kursi' => $request->jumlah_kursi,
            'id_user' => $request->id_user,
            'id_show_seat' => $request->id_show_seat,
        ]);
        // dd($request->all());

        DB::table('show_seat')
            ->where('id_seat_audi', $audi_seat)
            ->update([
                'status' => '1',
                'show_id' => $show_id,
            ]);

        // paymentModel::create([]);

        $w =  bookingModel::select('id')->orderBy('id', 'DESC')->get();
        $id_booking = $w[0]->id;

        paymentModel::create([
            'jumlah_harga' => $request->jumlah_harga,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'payment_method' => $request->payment_method,
            'id_booking' => $id_booking,
        ]);


        return redirect('/show-Movies')->with(['success' => 'Anda Sudah Membeli Tiket']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
