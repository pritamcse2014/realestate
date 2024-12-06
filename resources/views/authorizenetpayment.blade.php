<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Authorize Net Payment</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" crossorigin="anonymous" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-5">
                        <h3 class="card-header p-3">Authorize Net Payment</h3>
                        <div class="card-body">
                            @session('success')
                            <div class="alert alert-success" role="alert">{{ $value }}</div>
                            @endsession @session('error')
                            <div class="alert alert-danger" role="alert">{{ $value }}</div>
                            @endsession
                            <form action="{{ route('authorizePayment') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-form-label text-md-right" for="card_number">Enter Your Card Number</label>
                                        <input
                                            class="form-control @error('card_number') is-invalid @enderror"
                                            type="text"
                                            name="card_number"
                                            id="card_number"
                                            placeholder="Enter Your Card Number"
                                            autocomplete="off"
                                            maxlength="16"
                                            required
                                        />
                                        @error('card_number')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label text-md-right" for="expiration_date">Enter Your Expiration Date</label>
                                        <input
                                            class="form-control @error('expiration_date') is-invalid @enderror"
                                            type="date"
                                            name="expiration_date"
                                            id="expiration_date"
                                            placeholder="Enter Your Expiration Date"
                                            autocomplete="off"
                                            maxlength="16"
                                            required
                                        />
                                        @error('expiration_date')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label text-md-right" for="cvv_number">Enter Your CVV Number</label>
                                        <input class="form-control @error('cvv_number') is-invalid @enderror" type="text" name="cvv_number" id="cvv_number" placeholder="Enter Your CVV Number" autocomplete="off" maxlength="16" required />
                                        @error('cvv_number')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-success" type="submit">Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>