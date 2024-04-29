<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\tamu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
   
    public function search(Request $request)
{
    $search = $request->input('search');
    
    $tamu = Tamu::when($search, function ($query) use ($search) {
        return $query->where('nama_lengkap', 'like', "%$search%");
    })->get();

    return view('index', compact('tamu'));
}
    public function index()
    {
        $tamu = tamu::all();
        return view('index', compact('tamu'));
    }


    public function create()
    {
        return view('tamu.create');
    }

    public function store(Request $request)
    {
        $request->validate(Tamu::rules());

        $imagePath = ''; // Inisialisasi path gambar

        if ($request->hasFile('image')) {
            // Jika gambar diunggah dari file
            $imagePath = $request->file('image')->store('images', 'public');
        } elseif ($request->has('cameraImage')) {
            // Jika gambar diambil dari kamera
            $imagePath = $request->file('cameraImage')->store('images', 'public');
        }

        Tamu::create([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'email' => $request->input('email'),
            'kategori' => $request->input('kategori'),
            'tujuan' => $request->input('tujuan'),
            'image_path' => $imagePath,
        ]);

        $request->merge(['tanggal' => now()]); // Isi tanggal_masuk dengan waktu sekarang

        session()->flash('notification', 'Terimakasih Telah Mengisih Data Anda.');

        return redirect()->route('welcome')->with('success', 'Tamu berhasil ditambahkan!');
    }


   public function update(Request $request, $id)
{
    $tamu = Tamu::findOrFail($id);

    $request->validate([
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'email' => 'required|email',
        'kategori' => 'required',
        'tujuan' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Atur aturan validasi untuk gambar (opsional)
    ]);

    // Mengelola gambar jika diunggah
    $imagePath = $tamu->image_path;

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        Storage::disk('public')->delete($tamu->image_path);

        // Simpan gambar yang baru diunggah
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // Update data tamu
    $tamu->update([
        'nama_lengkap' => $request->input('nama_lengkap'),
        'alamat' => $request->input('alamat'),
        'no_telp' => $request->input('no_telp'),
        'email' => $request->input('email'),
        'kategori' => $request->input('kategori'),
        'tujuan' => $request->input('tujuan'),
        'image_path' => $imagePath,
    ]);

    return redirect()->route('index')->with('success', 'Data tamu berhasil diperbarui!');
}

    

    public function edit(tamu $tamu)
    {
        return view('tamu.edit', compact('tamu'));
    }
    
    public function destroy(tamu $tamu)
    {
        $tamu->delete();
        
        return redirect()->route('index')->with('success', 'Data tamu berhasil dihapus!');
    }

    //register sama login
    public function RegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi sukses. Sekarang kamu bisa login.');
    }
    
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        
        // Validasi input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba melakukan otentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            return redirect()->route('index');
        }
        // Jika otentikasi gagal, redirect kembali dengan pesan error
        return back()->with('error', 'Invalid credentials');
    }

    //dashboard
    public function dailyTotal()
{
    $today = Carbon::now()->format('Y-m-d');
    $totalTamuDaily = Tamu::whereDate('created_at', $today)->count();

    $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
    $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');
    $totalTamuWeekly = Tamu::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();

    $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
    $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
    $totalTamuMonthly = Tamu::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

    $startOfYear = Carbon::now()->startOfYear()->format('Y-m-d');
    $endOfYear = Carbon::now()->endOfYear()->format('Y-m-d');
    $totalTamuYearly = Tamu::whereBetween('created_at', [$startOfYear, $endOfYear])->count();

    $totalSeluruhTamu = Tamu::count();

    return view('tamus.dailyTotal', compact('totalTamuDaily', 'totalTamuWeekly', 'totalTamuMonthly', 'totalTamuYearly', 'totalSeluruhTamu'));
}

//nampilin data tamu
public function tamuHariIni()
{
    // Mengambil data tamu yang datang hari ini
    $tamuHariIni = Tamu::whereDate('created_at', Carbon::now()->format('Y-m-d'))->get();

    return view('tamus.tamuHariIni', compact('tamuHariIni'));
}

public function tamuMingguan()
{
    $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
    $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');
    $tamuMingguan = Tamu::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

    return view('tamus.tamuMingguan', compact('tamuMingguan'));
}

public function tamuBulanan()
{
    $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
    $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
    $tamuBulanan = Tamu::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();

    return view('tamus.tamuBulanan', compact('tamuBulanan'));
}

public function tamuTahunan()
{
    $startOfYear = Carbon::now()->startOfYear()->format('Y-m-d');
    $endOfYear = Carbon::now()->endOfYear()->format('Y-m-d');
    $tamuTahunan = Tamu::whereBetween('created_at', [$startOfYear, $endOfYear])->get();

    return view('tamus.tamuTahunan', compact('tamuTahunan'));
}

}
