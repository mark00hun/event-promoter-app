@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table datatable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
                <th>Location</th>
                <th>Performer</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(function () {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('home') }}",
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'location',
                        name: 'location.name'
                    },
                    {
                        data: 'performer',
                        name: 'performer.name'
                    },
                ]
            });

        });
    </script>
@endsection
