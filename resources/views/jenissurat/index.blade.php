@extends('template.layout')

@section('title','Daftar Jenis Surat')

@section('content')
<div class="row">
            <div class="col-lg-12">
                <span>Daftar Jenis Surat</span>
                <br>
                <a href="{{url('/jenissurat/tambah')}}">
                    <btn class="btn btn-success">Tambah Jenis Surat</btn>
                </a>
                <hr>
                <table class="table table-hovered table-bordered">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                Jenis Surat
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenis_surat as $js)
                            <tr>
                                <td>#</td>
                                <td>{{$js->jenis_surat}}</td>
                                <td>
                                    <a href="{{url('/jenissurat/edit/'.$js->id_jenis_surat)}}"><btn class="btn btn-primary"> Edit</btn></a>
                                    <btn class="btn btn-danger hpsBtn" attr-id="{{$js->id_jenis_surat}}"> Hapus</btn>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>   
           </div>
</div>
@endsection
@section('footer')
<script type="module">
    $('.table tbody').on('click','.hpsBtn',function(event){
        event.preventDefault();
        event.stopImmediatePropagation();
        let idJnsSurat = $(this).closest('.hpsBtn').attr('attr-id');
        //alert(idJnsSurat);
        swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: 'Batal',
            confirmButtonColor: 'red',
        }).then((result)=> {
            if(result.isConfirmed){
                //Jalankan ajax post untuk hapus
                axios.post('/jenissurat/hapus',{
                    'id_jenis_surat' : idJnsSurat
                }).then(function(response){
                    console.log(response);
                    if(response.data.status){
                        swal.fire({
                            title: "Berhasil",
                            text: response.data.pesan,
                            icon: "success"
                        }).then(()=>{
                            window.location.reload();
                        });
                    }else{
                        alert(response.data.pesan);
                    }
                }).catch(function(error){
                    swal.fire({
                            title: "Gagal!",
                            text: "Data gagal dihapus",
                            icon: "error"
                        });
                });
            }else{
                //close modal popup event
            }
        }).catch(function(error){
            swal.fire({
                            title: "Gagal!",
                            text: "Data gagal dihapus",
                            icon: "error"
                        });
        });
    });
</script>
@endsection