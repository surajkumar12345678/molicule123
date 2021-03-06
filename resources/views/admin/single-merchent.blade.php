@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style type="text/css">
  .sb-example-1 .search {
  width: 100%;
  position: relative;
  display: flex;
}
.sb-example-1 .searchTerm {
    width: 100%;
    border: none;
    padding: 10px;
    margin-left: 70px;
  }
.sb-example-1 .searchTerm:focus{
  color: #00B4CC;
}
.sb-example-1 .searchButton {
    width: 40px;

    /* height: 50px; */
    border: 1px solid #ffffff;
    background: #ffffff;
    text-align: center;
    color: #10000045;
    /* border-radius: 0 5px 5px 0; */
    cursor: pointer;
    font-size: 20px;
}

.table{
  font-size: 12px;
}
</style>

<div class="wrapper mt-5 mx-5" >
    <h1 class="text-3xl">{{ $merchent->first_name }}</h1>
    <div class="content mt-2">
        @if ($msg=Session::get('msg'))
        <div id="error" class="bg-green-500 w-1/4 px-4 py-2 rounded-xl text-white text-sm mb-4">
                <p>{{ $msg }}</p>
            </div>
            @endif
    </div>
    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }
    </style>
    {{-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



    <a href="{{ route('merchents') }}" class="btn btn-info">Back</a>
    <div class="bg-gray-100">

        <!-- End of Navbar -->

        <div class="container mx-auto my-3">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 border-t-4 border-green-400">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                                src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                alt="">
                        </div>
                        <h1 class="text-gray-900 font-bold text-lg my-3 mx-1" style="overflow-wrap: break-word; !important">{{ $merchent->first_name }}</h1>
                        {{-- <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $merchent->stores }}</h3> --}}
                        {{-- <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit.
                            Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p> --}}
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto">
                                    @if ($merchent->is_varified==1)
                                        <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                    @else
                                    <span class="bg-gray-300 py-1 px-2 rounded text-white text-sm">Inctive</span></span>
                                    @endif
                            </li>
                            <li class="items-center py-3">
                                <span>Member since</span><br>
                                <span class="ml-auto">{{ $merchent->created_at }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 hover:shadow">
                        {{-- <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                            <span class="text-green-500">
                                <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </span>
                            <span>Similar Profiles</span>
                        </div> --}}
                        {{-- <div class="grid grid-cols-3">
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://cdn.australianageingagenda.com.au/wp-content/uploads/2015/06/28085920/Phil-Beckett-2-e1435107243361.jpg"
                                    alt="">
                                <a href="#" class="text-main-color">Kojstantin</a>
                            </div>
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://widgetwhats.com/app/uploads/2019/11/free-profile-photo-whatsapp-4.png"
                                    alt="">
                                <a href="#" class="text-main-color">James</a>
                            </div>
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                    alt="">
                                <a href="#" class="text-main-color">Natie</a>
                            </div>
                            <div class="text-center my-2">
                                <img class="h-16 w-16 rounded-full mx-auto"
                                    src="https://bucketeer-e05bbc84-baa3-437e-9518-adb32be77984.s3.amazonaws.com/public/images/f04b52da-12f2-449f-b90c-5e4d5e2b1469_361x361.png"
                                    alt="">
                                <a href="#" class="text-main-color">Casey</a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- End of friends card -->
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-1">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-1 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-1 font-semibold text-gray-900 leading-5">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2" style="overflow-wrap: break-word;">
                                    <div class="px-2 py-2 font-semibold">First Name</div>
                                    <div class="px-2 py-2">{{ Str::limit($merchent->first_name, 15, '...') }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-2 py-2 font-semibold">Last Name</div>
                                    <div class="px-2 py-2">{{ Str::limit($merchent->first_name, 15, '...')  }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-2 py-2 font-semibold">Email</div>
                                    <div class="px-2 py-2 overflow-ellipsis">{{  $merchent->email   }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-2 py-2 font-semibold">Contact No.</div>
                                    <div class="px-2 py-2">{{ $merchent->mobile_number }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Store Info</span>
                                </div>
                                @forelse ($merchent->stores as $store)
                                {{-- {{ dd($store); }} --}}
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">Store Name</div>
                                        <div class="text-gray-500 text-xs">{{ $store->store_name }}</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">About Store</div>
                                        <div class="text-gray-500 text-xs">{{ Str::limit($store->about_store, 20, '...') }}</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Domain Name</div>
                                        <div class="text-gray-500 text-xs">{{ $store->domain_name }}</div>
                                    </li>
                                </ul>
                                @empty
                                    <span>No store set up</span>
                                @endforelse

                            </div>
                            {{-- <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Education</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-teal-600">Masters Degree in Oxford</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                        <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                    </li>
                                </ul>
                            </div> --}}
                        {{-- </div> --}}
                        <!-- End of Experience and education grid -->
                    {{-- </div> --}}
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
