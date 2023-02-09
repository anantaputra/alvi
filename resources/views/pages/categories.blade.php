@extends('layouts.app', ['titlePage' => 'Ecommerce - Category'])

@section('content-page')
<div class="page-content page-home">

    <sectionclass="store-breadcrumbs" data-aos="fade-down"data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb bg-secondary">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Product
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </sectionclass>

  <section class="store-trend-categories">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Kategori Produk</h5>
        </div>
      </div>
      <div class="row">
       @forelse ($categories as $item)
       <div
       class="col-6 col-md-3 col-lg-2"
       data-aos="fade-up"
       data-aos-delay="100"
     >
       <a class="component-categories d-block" href="{{ route('category',$item->slug) }}">
         <div class="categories-image">
           <img
             src="{{ Storage::url($item->photo) }}"
             alt="Gadgets Categories"
             class="w-100"
           />
         </div>
         <p class="categories-text">
           {{ $item->name }}
         </p>
       </a>
     </div>
       @empty
       <div
       class="col-12 col-md-3 col-lg-3"
       data-aos="fade-up"
       data-aos-delay="100"
     >
       <a class="component-categories d-block" href="javascript:void(0)">

         <p class="categories-text">
          Tidak Ada kategori
         </p>
       </a>
     </div>
       @endforelse

      </div>
    </div>
  </section>
  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
         <b> <h5>Semua Produk</h5></b>
        </div>
      </div>
      <div class="row">
             @forelse ($products as $item)
             <div
             class="col-6 col-md-4 col-lg-3 h-100 mt-3"
             data-aos="fade-up"
             data-aos-delay="100"
           >

             <div class="card border-0 shadow rounded-md">
               <div class="card-image">
                 <img src="{{ Storage::url($item->galleries->first()->photos) }}" class="w-100" style="height: 15em; object-fit: cover; border-top-left-radius: 0.25rem; border-top-right-radius: 0.25rem;">
               </div>
               <div class="card-body">
                 <a href="/product/macbook-pro-16-m1-max" class="card-title font-weight-bold" style="font-size: 20px;">{{ $item->name }}</a>

                 <div class="price font-weight-bold mt-2" > {{ moneyFormat($item->price) }}</div>
                 <a href="{{ route('product',$item->slug) }}" class="btn btn-primary btn-md mt-3 btn-block shadow-md">Detail</a>
               </div>
             </div>

           </div>
             @empty
             <div class="row">
                <div class="col-sm-12" data-aos="fade-up" data-aos-delay="100">
                    <a class="component-categories d-block" href="javascript:void(0)">
                        <p class="categories-text">
                            Tidak ada Produk
                        </p>
                    </a>
                </div>
             </div>
             @endforelse
      </div>
    </div>
  </section>
</div>

@endsection
