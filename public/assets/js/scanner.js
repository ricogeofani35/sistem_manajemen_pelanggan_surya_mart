$(function() {
    function onScanSuccess(decodedText, decodedResult) {
        let csrf_token = $('meta[name="csrf-token"]').attr('content');
        //post data to ajax
        $.ajax(({
          url: '/product_detail',
          method: 'post',
          cache: false,
          data: {
            _token: csrf_token,
            data: decodedText
          },
          success: (response) => {
            // jika gagal
            if(response.status == 400)
            {
              swal('gagal', `${response.message}`, "error");
            } else {
            //jika berhasil

            // isi value
              let data = response.data;

              $('#name').text(data.name);
              $('#code').text(data.code);
              $('#price').text(data.price);
              $('#unit').text(data.unit);
              $('#stock').text(data.stock);
              $('.img-product').attr('src', `/storage/${data.image}`);
              
              // show modal
              $('#modalProductDetail').modal('show');

              // stop scanner
              clearInterval(scanner._foreverScanTimeout);
            }
          
          },
          error: (err) =>  console.log('error:' + err)
        }));
    }
    
    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // console.warn(`Code scan error = ${error}`);
    }
    
    let scanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
        scanner.render(onScanSuccess, onScanFailure);
});