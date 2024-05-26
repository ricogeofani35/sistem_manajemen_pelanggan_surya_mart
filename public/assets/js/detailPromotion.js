$(document).ready(function(){
    let btnPromotionDetail = function(e) {
      let csrf_token = $('meta[name="csrf-token"]').attr('content');
      let id = $(this).data('id');

      $.ajax(({
            url: '/promotions/' + id,
            method: 'get',
            cache: false,
            data: {
              _token: csrf_token,
              data: {data : id}
            },
            success: (response) => {
                // jika gagal
                if(response.status == 400)
                {
                  swal('gagal', `${response.message}`, "error");
                } else {
                  //jika berhasil
                  let data = response.data;

                  $('#name-product').text(data.product.name);
                  $('#code-product').text(data.product.code);
                  $('#price-product').text(data.product.price);
                  $('#price-product-discount').text(data.promotion_price);
                  $('#unit-product').text(data.product.unit);
                  $('#stock-product').text(data.product.stock);
                  $('#beginning-date').text(data.beginning_date);
                  $('#end-date').text(data.end_date);
                  $('#description').text(data.description);
                  $('.img-promotion').attr('src', `/storage/assets/images/${data.product.image}`);
                }
            },
            error: (err) =>  console.log('error:' + err)
      }));

      $('#modalPromotionDetail').modal('show');
    };

    $('.btn-detail').on('click', btnPromotionDetail);  

  });