@extends('layouts.app')

@section('titulo')
    Crear Cuenta de Usuario
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center " >
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="imagen registro de usuarios"/>
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('cuenta.almacenar')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class=" mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tu nombre"
                        class=" border p-3 w-full rounded-lg @error('name') border-red-500  @enderror"
                        value="{{old('name')}}"
                        />
                        @error('name')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class=" mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input 
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu Email"
                        value="{{old('email')}}"
                        class=" border p-3 w-full rounded-lg @error('email') border-red-500  @enderror"/>

                        @error('email')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror

                </div>
                <div class="mb-5">
                    <label for="username" class=" mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu Usuario"
                        value="{{old('username')}}"
                        class=" border p-3 w-full rounded-lg @error('name') border-red-500  @enderror"/>
                        @error('username')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror

                </div>
                <div class="mb-5">
                    <label for="password" class=" mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"                      
                        class=" border p-3 w-full rounded-lg @error('name') border-red-500  @enderror"/>
                        @error('password')
                            <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        @enderror

                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class=" mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repetir Password"
                        class=" border p-3 w-full rounded-lg"/>

                </div>

                <input type="submit"
                        value="Crear Cuenta"
                        class=" bg-sky-600 w-full hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg">
            </form>
        </div>


    </div>
@endsection
