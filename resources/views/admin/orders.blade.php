@extends('admin.layout')
@section('e')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delivery At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $d->orderUser->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $d->quantity }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $d->status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $d->totalprice }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $d->orderProduct->product_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $d->deliverydate }}
                                </td>
                                <td class="px-6 py-4 text-right ">
                                    <button id="dropdownDefaultButton{{$d->id}}" data-dropdown-toggle="dropdown{{$d->id}}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Options</button>
                                        
                                </td>
                            </tr>
                        @endforeach
{{-- 
                        < class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown{{$d->id}} button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                            </>
                            
                            <!-- Dropdown{{$d->id}} menu --> --}}
                            
                            
                    </tbody>
                </table>
            </div>
        </div><div id="dropdown{{$d->id}}" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton{{$d->id}}">
                                              <li>
                                                <a href="/admin/complete/{{$d->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mark As complete</a>
                                              </li>
                                              <li>
                                                <a href="/admin/reject/{{$d->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reject</a>
                                              </li>
                                            </ul>
                                        </div>
    </div>
@endsection
