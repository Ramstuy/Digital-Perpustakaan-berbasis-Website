<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;


class BooksExport extends StringValueBinder implements WithCustomValueBinder, FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Book::query();
    }

    public function headings(): array
    {
        return [
            'ID Buku',
            'Cover Buku',
            'Judul Buku',
            'Jumlah Buku',
            'Deskripsi Buku',
            'File Buku'
        ];
    }

    public function map($book): array
    {
        return [
            $book->id,
            $book->cover,
            $book->title,
            $book->quantity,
            $book->description,
            $book->file,
        ];
    }
}
