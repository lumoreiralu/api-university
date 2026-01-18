
@extends('layaouts.app')
@section('content')


if (empty($degrees)) {
    echo "<p class='no-data'>There is not data to display.</p>";
    return;
}

$groupedDegrees = [];
foreach ($degrees as $item) {
    if (!isset($groupedDegrees[$item->nombre_carrera])) {
        $groupedDegrees[$item->nombre_carrera] = [
            'duracion' => $item->duracion,
            'materias' => []
        ];
    }
    $groupedDegrees[$item->nombre_carrera]['materias'][] = $item->Materia;
}
?>
<table class="styled-table">
    <thead>
        <tr>
            <th>Degree</th>
            <th>Courses</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
        foreach ($groupedDegrees as $nombreCarrera => $datos): 
            <tr>
                <td class="degree-name">
                    <strong>$nombreCarrera;</strong>
                </td>
                <td>
                    <ul class="courses-list">
                        foreach ($datos['materias'] as $materia): 
                            <li> $materia; </li>
                         endforeach; 
                    </ul>
                </td>
                <td>
                   <strong>  echo $datos['duracion'] . ' years';  </strong>
                </td>
            </tr>
         endforeach;
    </tbody>
</table>

@endsection