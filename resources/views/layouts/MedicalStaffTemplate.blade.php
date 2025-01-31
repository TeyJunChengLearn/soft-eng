<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="Stylesheet" href="/css/base.css">
    <link rel="Stylesheet" href="/css/userinterface.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="page">
        <div class="user-sidebar">
            <div class="user-sidebar-top-container">
                    <img src="/assets/cat database logo.jpg" class="user-sidebar-logo">
                <div class="user-sidebar-list">
                    <a href="{{route('medicalStaff.healthRecord.sanctuaryList')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='catHealthRecord') ? 'selected' : 'notselected' }}">
                            Cat Health Records
                        </div>
                    </a>
                    <a href="{{route('medicalStaff.treatment.sanctuaryList')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='catTreatment') ? 'selected' : 'notselected' }}">
                            Treatment
                        </div>
                    </a>
                    <a href="{{route("medicalStaff.medicalCare.sanctuaryList")}}">
                        <div class="user-sidebar-list-item-{{ ($page=='catMedicalCare') ? 'selected' : 'notselected' }}">
                            Medical Care
                        </div>
                    </a>
                    <a href="{{route('medicalStaff.appointment.list')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='appointment') ? 'selected' : 'notselected' }}">
                            Appointment
                        </div>
                    </a>
                    <a href="{{route('medicalstaff.joinGroup.index')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='joinGroup') ? 'selected' : 'notselected' }}">
                            Request Join Group
                        </div>
                    </a>
                    <a href="{{route('medicalStaff.feedback')}}">
                        <div class="user-sidebar-list-item-{{ ($page=='feedback') ? 'selected' : 'notselected' }}">
                            Feedback
                        </div>
                    </a>
                </div>
            </div>
            <a href="{{route('logout.get')}}">
                <div class="user-sidebar-logout">
                Log Out
                </div>
            </a>
        </div>
        <div class="user-main">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
