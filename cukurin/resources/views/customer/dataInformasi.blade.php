@extends('layouts.master-user')
@section('header', 'Informasi')
@section('content')
<section class="padding ptb-xs-40">
    <div class="row">
      @if (isset($datainformasi) && count($datainformasi) > 0)
      @foreach($datainformasi as $if)
      <div class="col-12 col-md-4 col-lg-4" style="padding:30px;">
        <article class="article article-style-c" style="csolid #dedede;text-align:center;">
          <div class="product-details">
            <h3 class="text-center">{{$if->judul}}</a></h3>
            <h5 class="text-center">Jenis Informasi :{{$if->jenisInformasi}}</h5>
            <h6 class="text-center">{{$if->ulasan}}</h6>
            <!-- <div class="add-to-cart mb-20" >
              <a href="{{url(''.$if->id)}}"><i class="btn btn-success">Tukarkan</i></a>
            </div> -->
          </div>
        </article>
      </div>
      @endforeach
      
         @else
         <div class="col-md-6 col-lg-12 mb-30 text-center">
          <tr class="text-center">
              <td colspan="4"><h4> Belum ada informasi yang diunggah </h4></td>
          </tr>
        </div>
      @endif
    </div>
  </div>
</section>
@endsection