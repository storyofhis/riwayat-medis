<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekam Medis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <h3> Formulir {{  Auth::user()->name }} </h3>
                  <div class="fixed h-full w-full flex items-center justify-center bg-opacity-50 bg-gray-700">
                    <div class="z-10">
                        <div class="w-56 h-64 text-center rounded-lg">
                             <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
                                 @if (count($errors) > 0)
                                 <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                     <span class="block sm:inline">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                     </span>
                                 </div>
                                 @endif
             
                                 <form action="/process-screening" method="POST" class="bg-dark shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                 <div class="grid grid-cols-2 gap-4">
                                     <div class="form-group mb-6">
                                         <label for="nama" class="block text-gray-700 text-sm font-bold mb-2 dark:text-dark">
                                             NAMA LENGKAP
                                         </label>
                                     <p type="text" class="form-control
                                         block
                                         w-full
                                         px-3
                                         py-1.5
                                         text-base
                                         font-normal
                                         text-gray-700
                                         bg-white bg-clip-padding
                                         border border-solid border-gray-300
                                         rounded
                                         transition
                                         ease-in-out
                                         m-0
                                         focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                         aria-describedby="emailHelp123" placeholder="Nama Lengkap" name="nama">
                                         {{  Auth::user()->name  }}
                                        </p>
                                     </div>
                                     <div class="form-group">
                                        <label for="dokter" class="form-label">NAMA DOKTER</label>
                                        <select id="dokter" name="doctor" class="form-select">
                                            <option>
                                                Dr. Strange
                                            </option>
                                            <option>
                                                Dr. Doofenshmirtz
                                            </option>
                                            <option>
                                                Dr. Phil
                                            </option>
                                        </select>
                                    </div>
                                     <div class="form-group mb-6">
                                         <label for="nik" class="block text-gray-700 text-sm font-bold mb-2 dark:text-dark">
                                            KONDISI KESEHATAN
                                         </label>
                                     <input type="text" class="form-control
                                         block
                                         w-full
                                         px-3
                                         py-1.5
                                         text-base
                                         font-normal
                                         text-gray-700
                                         bg-white bg-clip-padding
                                         border border-solid border-gray-300
                                         rounded
                                         transition
                                         ease-in-out
                                         m-0
                                         focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        placeholder="KONDISI KESEHATAN" name="kondisi-kesehatan" value="{{ old('kondisi-kesehatan') }}" >
                                     </div>
                                 </div>
                                 <div class="form-group mb-6">
                                     <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2 dark:text-dark">
                                         SUHU TUBUH
                                     </label>
                                     <input type="text" class="form-control block
                                     w-full
                                     px-3
                                     py-1.5
                                     text-base
                                     font-normal
                                     text-gray-700
                                     bg-white bg-clip-padding
                                     border border-solid border-gray-300
                                     rounded
                                     transition
                                     ease-in-out
                                     m-0
                                     focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                                     placeholder="(35 C - 45.5 C)" name="suhu" value="{{ old('suhu') }}">
                                 </div>   
                                 <div class="flex justify-center">
                                     <div class="mb-3 w-96">
                                         <label for="ktp" class="block text-gray-700 text-sm font-bold mb-2 dark:text-dark">
                                            UNGGAH FILE/GAMBAR RESEP (pdf/png/jpg/jpeg)
                                         </label>
                                       <input class="form-control
                                       block
                                       w-full
                                       px-3
                                       py-1.5
                                       text-base
                                       font-normal
                                       text-gray-700
                                       bg-white bg-clip-padding
                                       border border-solid border-gray-300
                                       rounded
                                       transition
                                       ease-in-out
                                       m-0
                                       focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" name="file" value="{{ old('file') }}">
                                     </div>
                                 </div>                    
                                 <button type="submit" class="
                                     w-full
                                     px-6
                                     py-2.5
                                     bg-blue-600
                                     text-white
                                     font-medium
                                     text-xs
                                     leading-tight
                                     uppercase
                                     rounded
                                     shadow-md
                                     hover:bg-blue-700 hover:shadow-lg
                                     focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                     active:bg-blue-800 active:shadow-lg
                                     transition
                                     duration-150
                                     ease-in-out
                                     inline-flex items-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                     >Screening Form
                                     <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                 </button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                  <br/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>