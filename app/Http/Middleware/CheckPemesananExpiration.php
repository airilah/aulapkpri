<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPemesananExpiration
{
    // app/Http/Middleware/CheckPemesananExpiration.php

    // public function handle($request, Closure $next)
    // {
    //     $pemesanan = Pemesanan::find($request->route('id'));

    //     if ($pemesanan && !$pemesanan->bukti_pembayaran && now()->gt($pemesanan->waktu_expired)) {
    //         // Pemesanan tidak memiliki bukti pembayaran dan telah kedaluwarsa
    //         $pemesanan->status = 'Kadaluarsa';
    //         $pemesanan->save();

    //         // Redirect ke riwayat dengan pesan
    //         return redirect()->route('riwayat')->with('tenggat', 'Pemesanan telah kedaluwarsa.');
    //     }

    //     return $next($request);
    // }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

}
