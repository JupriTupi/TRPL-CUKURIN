@extends('layouts.master-user')
@section('header', 'Layanan')
@section('content')
<section class="padding ptb-xs-40">
    <div class="row">
      @if (isset($datalayanan) && count($datalayanan) > 0)
      @foreach($datalayanan as $ly)
      <div class="col-12 col-md-4 col-lg-4" style="padding:30px;">
        <article class="article article-style-c" style="csolid #dedede;text-align:center;">
          <div class="article-header">
              <div class="article-image" data-background="{{$ly->getPhoto()}}">
              </div>
          </div>
          <div class="product-details">
            <h3 class="text-center">{{$ly->namalayanan}}</a></h3>
            <h5 class="text-center">Rp {{$ly->harga}}</h5>
            <h6 class="text-center">Tempat : {{$ly->users->name}}</h6>
            <p>
              {{$ly->deskripsi}}
            </p>
            <div class="add-to-cart mb-20" >
              <a href="{{url(''.$ly->id)}}" style=""><i class="fa fa-shopping-cart"></i>&nbsp;Order Layanan</a>
            </div>
          </div>
        </article>
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