<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Portal.Auth.login');
    }

    public function showRegister()
    {
        return view('Auth.register');
    }

    public function submitFormDaftar(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'multiStepsName' => 'required|string',
                'multiStepsUsername' => 'required|string',
                'multiStepsEmail' => 'required|email',
                'multiStepsWhatsapp' => 'required|string',
                'multiStepsPass' => 'required|string|min:8',
                'multiStepsConfirmPass' => 'required|string|same:multiStepsPass',
                'multiStepsProvince' => 'required|string',
                'multiStepsRegency' => 'required|string',
                'multiStepsDistrict' => 'required|string',
                'multiStepsVillage' => 'required|string',
                'multiStepsProfileImage' => 'required|image',
                'officeName' => 'required|string',
                'officeEmail' => 'required|email',
                'officePhone' => 'required|string',
                'flatpickr-date' => 'required|date',
                'officeAddress' => 'required|string',
                'postCode' => 'required|string',
                'officeProvince' => 'required|string',
                'officeRegency' => 'required|string',
                'officeDistrict' => 'required|string',
                'officeVillage' => 'required|string',
                'website' => 'nullable|url',
                'slogan' => 'required|string',
                'logo' => 'required|image',
                'legalDocument' => 'required|file|mimes:pdf,jpeg,png,jpg',
                'setuju' => 'required|accepted',
            ]);
    
            $response = [
                'success' => true,
                'title' => 'Berhasil',
                'message' => 'Customer berhasil ditambahkan.'
            ];
    
            return redirect()->back()->with('response', $response);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            $errorMessage = 'Terdapat kesalahan dalam input data Anda: ';
    
            foreach ($errors as $field => $messages) {
                $errorMessage .= implode(', ', $messages) . ' ';
            }
    
            $response = [
                'success' => false,
                'title' => 'Gagal',
                'message' => $errorMessage
            ];
    
            return redirect()->back()->with('response', $response)->withErrors($errors);
        }
    }
    

    public function resizeImage(Request $request)
    {
        // Validasi tipe file
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Batas ukuran 2 MB
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $image = $request->file('image');

        // Mengambil ekstensi file
        $extension = $image->getClientOriginalExtension();
        
        // Menghasilkan nama unik untuk file
        $filename = time() . '.' . $extension;

        // Simpan gambar ke dalam variabel Intervention Image
        $img = Image::make($image->path());

        // Mengubah resolusi gambar menjadi lebar maksimum 800px dan tinggi maksimum 600px
        $img->resize(800, 600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Mengonversi gambar ke format WebP
        $img->encode('webp');

        // Simpan gambar yang sudah diubah ke dalam direktori yang diinginkan
        $img->save(public_path('images/resized/' . $filename));

        // Hapus file asli jika berhasil disimpan
        File::delete($image->path());

        return 'Gambar berhasil diubah resolusinya dan dikonversi ke format WebP!';
    }

    //Get Data
        public function getProvinces(Request $request)
        {
            if ($request->ajax()) {
                $search = $request->input('search'); // Mengambil nilai pencarian dari request
        
                // Mengambil data provinsi dengan filter berdasarkan nama jika ada parameter pencarian
                $provinces = Province::when($search, function ($query) use ($search) {
                    return $query->where('name', 'like', '%'.$search.'%');
                })->get();
        
                return response()->json($provinces);
            } else {
                abort(403, 'Unauthorized access');
            }
        }
        public function getProvincesOffice(Request $request)
        {
            if ($request->ajax()) {
                $search = $request->input('search'); // Mengambil nilai pencarian dari request
        
                // Mengambil data provinsi dengan filter berdasarkan nama jika ada parameter pencarian
                $provinces = Province::when($search, function ($query) use ($search) {
                    return $query->where('name', 'like', '%'.$search.'%');
                })->get();
        
                return response()->json($provinces);
            } else {
                abort(403, 'Unauthorized access');
            }
        }
    
        public function getRegencies(Request $request)
        {
            if ($request->ajax()) {
                $provinceCode = $request->input('province_code');
                $search = $request->input('search');
        
                $regencies = Regency::where('province_code', $provinceCode)
                                    ->when($search, function ($query) use ($search) {
                                        return $query->where('name', 'like', '%'.$search.'%');
                                    })
                                    ->get();
        
                return response()->json($regencies);
            } else {
                abort(403, 'Unauthorized access');
            }
        }
        
        public function getDistricts(Request $request)
        {
            if ($request->ajax()) {
                $regencyCode = $request->input('regency_code');
                $search = $request->input('search');
        
                $districts = District::where('regency_code', $regencyCode)
                                    ->when($search, function ($query) use ($search) {
                                        return $query->where('name', 'like', '%'.$search.'%');
                                    })
                                    ->get();
        
                return response()->json($districts);
            } else {
                abort(403, 'Unauthorized access');
            }
        }
        
        public function getVillages(Request $request)
        {
            if ($request->ajax()) {
                $districtCode = $request->input('district_code');
                $search = $request->input('search');
        
                $villages = Village::where('district_code', $districtCode)
                                    ->when($search, function ($query) use ($search) {
                                        return $query->where('name', 'like', '%'.$search.'%');
                                    })
                                    ->get();
        
                return response()->json($villages);
            } else {
                abort(403, 'Unauthorized access');
            }
        }
        
    //!Get Data
}
