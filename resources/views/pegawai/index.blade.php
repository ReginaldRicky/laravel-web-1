<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Data Pegawai</h1>
        
        <div class="space-y-4">
            <div class="border-l-4 border-blue-500 bg-blue-50 p-4">
                <strong class="text-gray-700">Nama:</strong> 
                <span class="text-gray-900">{{ $name }}</span>
            </div>
            
            <div class="border-l-4 border-green-500 bg-green-50 p-4">
                <strong class="text-gray-700">Umur:</strong> 
                <span class="text-gray-900">{{ $my_age }} tahun</span>
            </div>
            
            <div class="border-l-4 border-purple-500 bg-purple-50 p-4">
                <strong class="text-gray-700">Hobi:</strong><br>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($hobbies as $hobby)
                        <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm">
                            {{ $hobby }}
                        </span>
                    @endforeach
                </div>
            </div>
            
            <div class="border-l-4 border-yellow-500 bg-yellow-50 p-4">
                <strong class="text-gray-700">Tanggal Harus Wisuda:</strong> 
                <span class="text-gray-900">{{ $tgl_harus_wisuda }}</span>
            </div>
            
            <div class="border-l-4 border-orange-500 bg-orange-50 p-4">
                <strong class="text-gray-700">Jarak Hari Menuju Wisuda:</strong> 
                <span class="text-gray-900">
                    @if($time_to_study_left > 0)
                        {{ $time_to_study_left }} hari lagi
                    @else
                        Sudah lewat {{ abs($time_to_study_left) }} hari
                    @endif
                </span>
            </div>
            
            <div class="border-l-4 border-indigo-500 bg-indigo-50 p-4">
                <strong class="text-gray-700">Semester Saat Ini:</strong> 
                <span class="text-gray-900">{{ $current_semester }}</span>
            </div>
            
            <div class="border-l-4 border-red-500 bg-red-50 p-4">
                <strong class="text-gray-700">Informasi:</strong> 
                <span class="text-gray-900">{{ $semester_info }}</span>
            </div>
            
            <div class="border-l-4 border-teal-500 bg-teal-50 p-4">
                <strong class="text-gray-700">Cita-cita:</strong>
                <span class="text-gray-900">{{ $future_goal }}</span>
            </div>
        </div>
    </div>
</body>
</html>