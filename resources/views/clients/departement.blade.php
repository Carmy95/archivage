@extends('clients.layouts.master')
@section('content')


<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="mt-50">
                    <div class="cart-title">
                        <h2>Liste des documents du Service</h2>
                    </div>
	                <div style="text-align: center;">
	                    <table class="table table-bordered table-hover">
	                        <thead>
	                            <tr>
	                                <th style="margin: 0%">#</th>
	                                <th>Réference</th>
	                                <th>date d'archivage</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
                                @if(empty($documents))
                                    <tr>
                                        <td colspan="4">Aucun document archivés pour votre service</td>
                                    </tr>
                                @else
                                    @php $t = 0; @endphp
                                    @foreach ($documents as $value)
                                    @foreach ($value['service'] as $key)
                                    @foreach ($key['document'] as $doc)
                                    <tr>
                                        <td>
                                            {{ $t = $t + 1 }}
                                        </td>
                                        <td>
                                            <h5>{{ $doc['reference'] }}</h5>
                                        </td>

                                        <td>
                                            <h5>{{ $doc['created_at'] }}</h5>
                                        </td>
                                        <td>
                                            <a href="{{ route('clients.departe.show',$doc['id']) }}" class="btn amado-btn">voir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                    @endforeach
                                @endif
	                        </tbody>
	                    </table>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
