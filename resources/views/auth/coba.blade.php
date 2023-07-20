@extends('template.general', [
    'title' => 'Siapin - Register'
])

@section('style')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
@endsection

@section('container')
    <select class="selectpicker" data-show-subtext="false" data-live-search="true">
        <option value="">Select</option>
        <option value='Anaesthesia'>Anaesthesia</option>
        <option value='Anatomy and Physiology'>Anatomy and Physiology</option>
        <option value='Cardiology'>Cardiology</option>
        <option value='Clinical Skills'>Clinical Skills</option>
        <option value='Critical Care'>Critical Care</option>
        <option value='Dermatology'>Dermatology</option>
        <option value='Ear, Nose and Throat'>Ear, Nose and Throat</option>
        <option value='Emergency Medicine'>Emergency Medicine</option>
        <option value='Emergency Nursing'>Emergency Nursing</option>
        <option value='Endocrinology and Diabetes'>Endocrinology and Diabetes</option>
        <option value='Gastroenterology'>Gastroenterology</option>
        <option value='General Dentistry'>General Dentistry</option>
        <option value='General Medicine'>General Medicine</option>
        <option value='General Practice'>General Practice</option>
        <option value='Geriatrics'>Geriatrics</option>
        <option value='Haematology'>Haematology</option>
        <option value='Immunology'>Immunology</option>
        <option value='Internal Medicine'>Internal Medicine</option>
        <option value='Maxillofacial and Plastic Surgery'>Maxillofacial and Plastic Surgery</option>
        <option value='Microbiology'>Microbiology</option>
        <option value='Midwifery'>Midwifery</option>
        <option value='Nephrology'>Nephrology</option>
        <option value='Neurology'>Neurology</option>
        <option value='Nursing'>Nursing</option>
        <option value='Obstetrics and Gynaecology'>Obstetrics and Gynaecology</option>
        <option value='Occupational Health'>Occupational Health</option>
        <option value='Oncology'>Oncology</option>
        <option value='Ophthalmology'>Ophthalmology</option>
        <option value='Oral Medicine'>Oral Medicine</option>
        <option value='Orthopaedics'>Orthopaedics</option>
        <option value='Paediatric Nursing'>Paediatric Nursing</option>
        <option value='Paediatrics'>Paediatrics</option>
        <option value='Pain Medicine'>Pain Medicine</option>
        <option value='Palliative Care'>Palliative Care</option>
        <option value='Pathology and Laboratory Medicine'>Pathology and Laboratory Medicine</option>
        <option value='Pharmacology'>Pharmacology</option>
        <option value='Psychiatry'>Psychiatry</option>
        <option value='Public Health'>Public Health</option>
        <option value='Radiology'>Radiology</option>
        <option value='Respiratory'>Respiratory</option>
        <option value='Restorative Dentistry'>Restorative Dentistry</option>
        <option value='Rheumatology'>Rheumatology</option>
        <option value='Surgery'>Surgery</option>
        <option value='Urology'>Urology</option>
    </select>

@endsection

@section('scripts')
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>--}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
@endsection
