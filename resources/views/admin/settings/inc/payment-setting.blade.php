<div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
    <div class="card-body">
        <form action="{{ route('setting.checkpayment') }}" method="POST">
            @csrf
            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i>Payment System</h5>
            <div class="row">
                <div class="col-md-12">

                        <h5 class="font-14 mb-2">Selct For Online Payment Gateway</h5>
                        @foreach ($payments as $payment)
                        <div class="form-check">
                            <input name="paymentmethod[]" @if( in_array(['payment_method_id' => $payment->id], $paymentdata) )  checked @endif class="form-check-input" type="checkbox" value="{{$payment->id}}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{$payment->name}}
                            </label>
                        </div>
                        @endforeach

                </div>

            </div> <!-- end row -->


            <div class="text-start">
                <button type="submit"
                    class="btn btn-primary waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save
                </button>
            </div>
        </form>
    </div>
</div>
