<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>

    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            @foreach ($dataproduk as $produk)
           
                <td class="text-center" style="border: 1px solid #333;">
                    <p>{{ $produk->nama_produk }} - Rp. {{ format_uang($produk->harga_jual) }}</p>
                   <img src="data:image/png;base64,{{DNS2D::getBarcodePNG( $produk->kode_produk, 'qrcode')}}"
                     
                        alt="{{ $produk->kode_produk }}"
                        width="180"
                        height="90">
                    <br>
                  
                    {{ $produk->kode_produk }}
                    
                    <br>
                 
             
                   
                        <figure float: right; ><img src="{{ ('img/logo.png')}}" width="120" height="120" float= "end"></figure>
                     </div>
                </td>
               
           
                @if ($no++ % 3 == 0)
                    </tr><tr>
                @endif
            @endforeach
        </tr>
    </table>
</body>
</html>