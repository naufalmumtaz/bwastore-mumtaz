@extends('layouts.app')

@section('title')
  Cart
@endsection

@section('content')
<div class="page-content page-cart">
    <section
    class="store-breadcrumbs"
    data-aos="fade-down"
    data-aos-delay="100"
    >
    <div class="container">
        <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                Cart
                </li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    </section>

    <section class="store-cart">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
                <table class="table table-borderless table-cart">
                <thead>
                    <tr>
                    <td>Image</td>
                    <td>Name &amp; Seller</td>
                    <td>Price</td>
                    <td>Menu</td>
                    </tr>
                </thead>
                    <tbody>
                        @php $total_price = 0; @endphp
                        @forelse ($carts as $cart) 
                            <tr>
                                <td style="width: 20%">
                                    @if ($cart->product->galleries)
                                    <img
                                        src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                        alt="img product"
                                        class="cart-image"
                                    />
                                    @endif
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">{{ $cart->product->name }}</div>
                                    <div class="product-subtitle">by {{ $cart->product->user->store_name }}</div>
                                </td>
                                <td style="width: 35%">
                                    <div class="product-title">${{ number_format($cart->product->price) }}</div>
                                    <div class="product-subtitle">USD</div>
                                </td>
                                <td style="width: 20%">
                                    <form action="{{ route('cart-delete', $cart->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-remove-cart">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @php $total_price += $cart->product->price; @endphp
                        @empty
                        <div class="col-12 text-center py-3" data-aos="fade-up" data-aos-delay="100">
                            Your Cart Is Empty
                        </div>    
                        @endforelse
                    </tbody>
                </table>
            </div>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="150">
                <div class="col-12">
                    <hr />
                </div>
                <div class="col-12">
                    <h2 class="mb-4">Shipping Details</h2>
                </div>
            </div>
            <form action="{{ route('checkout') }}" method="post" id="locations" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="total_price" value="{{ $total_price }}">
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="address_one">Address 1</label>
                        <input
                            type="text"
                            class="form-control"
                            id="address_one"
                            name="address_one"
                        />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="address_two">Address 2</label>
                        <input
                            type="text"
                            class="form-control"
                            id="address_two"
                            name="address_two"
                        />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="provinces_id">Province</label>
                            <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                                <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="regencies_id">City</label>
                            <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                                <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                            </select>
                            <select v-else class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="zip_code">Postal Code</label>
                        <input
                            type="text"
                            class="form-control"
                            id="zip_code"
                            name="zip_code"
                        />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="country">Country</label>
                        <input
                            type="text"
                            class="form-control"
                            id="country"
                            name="country"
                        />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="phone_number">Mobile Number</label>
                        <input
                            type="text"
                            class="form-control"
                            id="phone_number"
                            name="phone_number"
                        />
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-1">Payment Informations</h2>
                    </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="product-title">$10</div>
                        <div class="product-subtitle">Country Tax</div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title">$280</div>
                        <div class="product-subtitle">Product Insurane</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title">$58</div>
                        <div class="product-subtitle">Ship To Jakarta</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">${{ number_format($total_price ?? 0) }}</div>
                        <div class="product-subtitle">Total</div>
                    </div>
                    <div class="col-8 col-md-3">
                        <button type="submit" class="btn btn-success mt-4 px-4 btn-block">Checkout Now</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({
        el: "#locations",
        mounted() {
            AOS.init();
            this.getProvincesData();
        },
        data: {
            provinces: null,
            regencies: null,
            provinces_id: null,
            regencies_id: null,
        },
        methods: {
            getProvincesData: function() {
                var self = this;
                axios.get('{{ route('api-provinces') }}')
                    .then(function(response) {
                        self.provinces = response.data;
                    });
            },
            getRegenciesData: function() {
                var self = this;
                axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function(response) {
                        self.regencies = response.data;
                    });
            },
        },
        watch: {
            provinces_id : function(val, oldVal) {
                // membuat bila province ganti, jadi province yang baru dan sesuai
                this.regencies_id = null;
                this.getRegenciesData();
            }
        }
        });
    </script>
@endpush


