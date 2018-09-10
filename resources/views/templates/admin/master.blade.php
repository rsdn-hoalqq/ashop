<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <title>Crown - premium responsive admin template for backend systems</title>

    {{--<script--}}
            {{--src="https://code.jquery.com/jquery-3.2.1.js"--}}
            {{--integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="--}}
            {{--crossorigin="anonymous"></script>--}}

    <link href="{{$adminUrl}}/css/main.css" rel="stylesheet" type="text/css" />
    <link href="{{$adminUrl}}/css/model.css" rel="stylesheet" type="text/css" />
    <link href="{{$adminUrl}}/css/my.css" rel="stylesheet" type="text/css" />
    <script src="{{$adminUrl}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/jquery.validate.min.js"></script>
    <script src="{{$adminUrl}}/js/ckeditor/ckeditor.js"></script>
    <script src="{{$adminUrl}}/js/ckfinder/ckfinder.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/spinner/ui.spinner.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/spinner/jquery.mousewheel.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/charts/excanvas.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/charts/jquery.sparkline.min.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/uniform.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.cleditor.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/autogrowtextarea.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.dualListBox.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/jquery.inputlimiter.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/forms/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/wizard/jquery.form.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/wizard/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/wizard/jquery.form.wizard.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/uploader/plupload.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/uploader/plupload.html5.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/uploader/plupload.html4.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/uploader/jquery.plupload.queue.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/tables/datatable.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/tables/tablesort.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/tables/resizable.min.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.tipsy.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.collapsible.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.progress.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.colorpicker.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.jgrowl.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.breadcrumbs.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/ui/jquery.sourcerer.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/calendar.min.js"></script>
    <script type="text/javascript" src="{{$adminUrl}}/js/plugins/elfinder.min.js"></script>

    <script type="text/javascript" src="{{$adminUrl}}/js/custom.js"></script>

    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}

    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>

<body>

<!-- Left side content -->
@include('templates.admin.lefbar')


<!-- Right side -->
@yield('content')

<div class="clear"></div>

</body>
</html>