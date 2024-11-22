   <script
       src="https://code.jquery.com/jquery-3.3.1.js"
       integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
       crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
   <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
   <script>
       const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
       const Default = {
           scrollbarTheme: "os-theme-light",
           scrollbarAutoHide: "leave",
           scrollbarClickScroll: true,
       };
       document.addEventListener("DOMContentLoaded", function() {
           const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
           if (
               sidebarWrapper &&
               typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
           ) {
               OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                   scrollbars: {
                       theme: Default.scrollbarTheme,
                       autoHide: Default.scrollbarAutoHide,
                       clickScroll: Default.scrollbarClickScroll,
                   },
               });
           }
       });
   </script>