@extends('layouts.master-user')
@section('header', 'Layanan')
@section('content')
<section class="padding ptb-xs-40">
    <div class="row">
      <!-- @if (isset($datalayanan) && count($datalayanan) > 0) -->
      @foreach($datalayanan as $ly)
      <div class="col-md-6 col-lg-4 mb-30" style="padding:30px;">
        <div class="service_box" style="border: 1px solid #dedede;text-align:center;">
          <!-- <figure>
            <a href="#"><img src="{{$ly->getPhoto()}}" alt="" /></a>
          </figure> -->
          <div class="product-details">
            <h3 class="text-center"><a href="#">{{$ly->namalayanan}}</a></h3>
            <h4 class="text-color text-center">Rp {{$ly->harga}}</h4>
            <p>
              {{$ly->deskripsi}}
            </p>
            <div class="add-to-cart mb-20" >
              <a href="{{url('/paketpekerjaan/order/'.$ly->id)}}" style="border: 3px solid #6e8900;"><i class="fa fa-shopping-cart"></i>&nbsp;Order Layanan</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
         @else
         <div class="col-md-6 col-lg-12 mb-30 text-center">
          <tr class="text-center">
              <td colspan="4"><h4> Belum ada layanan yang tersedia </h4></td>
          </tr>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection