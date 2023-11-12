@extends('layout')
@section('contact')
    <form method="POST" action="{{route('login')}}">
        @csrf
        <div class="form-group">
            <label >E-mail</label>
            <input name="email" value="{{old('email')}}" required class="form-control{{$errors->has('email') ? ' is-invalid' : ''}}">
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('email')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label >Password</label>
            <input name="password" required type="password" class="form-control{{$errors->has('password') ? ' is-invalid' : ''}}">
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('password')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember" 
            value="{{old('remember') ? 'checked' : '' "
            >
            <label for="remember" class="form-check-label">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>




@endsection('content')