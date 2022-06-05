@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
                <th>Location</th>
                <th>Performer</th>
                <th>Action</th>
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
                responsive: true,
                ajax: "{{ route('events') }}",
                columns: [
                    {
                        data: 'id_event',
                        name: 'id_event'
                    },
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
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable:false
                    },
                ],
            });

        });
    </script>
@endsection
