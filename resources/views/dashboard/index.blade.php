<!DOCTYPE html>
<html lang="en">
    <head>
        <x-layout.meta.meta :title=$title :meta=$meta></x-layout.meta.meta>
    </head>
    <body>
        <!-- Left Sidenav -->
        <x-layout.navbar :data=$data></x-layout.navbar>
        <!-- end left-sidenav-->
        <x-layout.body></x-layout.body>
        <!-- end page-wrapper -->
        <!-- start footer  -->
        <x-layout.footer></x-layout.footer>
        <!-- end footer  -->
    </body>
</html>
