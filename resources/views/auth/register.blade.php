@extends('layout.auth')

@section('page-class', 'register-page')

@section('page-title', 'Register')

@section('scripts')
{{-- learn Jquery --}}
    <script> 
        var form = $('#registerForm');
        form.submit(function(event) {
            event.preventDefault();
           $('#errorMsg').remove();

    // the 'this' is refers to the HTML element to which that event is attached to... 
            var formData = new FormData(this);

            axios.post(form.attr('action'),formData)
            .then(function(response) {
              window.location = "{{route('admin.posts.index')}}";  
            })
            .catch(function(error) {
                if(error.response.status == 422){
                    var errMsg = Object.values(error.response.data.errors)[0][0]
                    var div = $('<div></div>').addClass('alert alert-danger').attr('id', 'errorMsg').text(errMsg);
                    div.insertAfter($('#registerFormTitle'));
                }else{
                    var errMsg = 'An unexpected error has occured. Please try again later.';
                    var div = $('<div></div>').addClass('alert alert-danger').attr('id', 'errorMsg').text(errMsg);
                    div.insertAfter($('#registerFormTitle'));
                }
            })
        })
    </script>
@endsection

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg" id="registerFormTitle">Register a new membership</p>

            <form id="registerForm" action="{{route('post.register')}}" method="post">
                <div class="input-group mb-3">
                    <input name="firstname" type="text" class="form-control" placeholder="First name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="lastname" type="text" class="form-control" placeholder="Last name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password_confirmation" type="password" class="form-control"
                        placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
            </form>

            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
