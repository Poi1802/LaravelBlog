@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Verify Your Email Address') }}</div>

          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                {{ __('На ваш адрес электронной почты была отправлена новая ссылка для проверки.') }}
              </div>
            @endif

            {{ __('Прежде чем приступить к работе, проверьте свою электронную почту на наличие проверочной ссылки.') }}
            {{ __('Если вы не получили электронное письмо') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите для повторной отправки') }}</button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
