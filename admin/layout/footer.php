   <!-- 1st jq core library-->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <!-- 2nd  popper required plugins-->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
   <!-- 3rd bootstrap required plugins-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
   <!-- 4th ajax and validator thired party plugins also below one-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
   <!-- 5th 3rd party-->
   <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- final custom-->
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