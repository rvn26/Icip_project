@extends('layouts.admin_layout')
 
@section('content')
    <div class="container fs-3">
        <div class="row justify-content-center vh-100 align-items-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-1 mb-4 text-center">Export Data</h5>
                        <form action="{{ route('admin.laporanexel') }}" method="GET">
                            <div class="mb-3">
                                <label for="bulan" class="form-label fs-5">Bulan</label>
                                <select class="form-select mb-10" name="bulan" id="bulan" required>
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ $m }}">
                                            {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="tahun" class="form-label fs-5">Tahun</label>
                                <select class="form-select mb-10" name="tahun" id="tahun" required>
                                    @for ($year = date('Y'); $year >= 2020; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success" onclick="exportPDF()">Export Exel</button>
                                <button type="button" class="btn btn-danger" onclick="exportExcel()">Export PDF</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection