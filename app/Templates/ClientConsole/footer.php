 <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>

    </div>
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="/templates/clientconsole/assets/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="/templates/clientconsole/assets/js/progressbar/bootstrap-progressbar.min.js"></script>
  
  <!-- icheck -->
  <script src="/templates/clientconsole/assets/js/icheck/icheck.min.js"></script>
  <!-- tags -->
  <script src="/templates/clientconsole/assets/js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="/templates/clientconsole/assets/js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="/templates/clientconsole/assets/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="/templates/clientconsole/assets/js/datepicker/daterangepicker.js"></script>
  <!-- richtext editor -->
  <script src="/templates/clientconsole/assets/js/editor/bootstrap-wysiwyg.js"></script>
  <script src="/templates/clientconsole/assets/js/editor/external/jquery.hotkeys.js"></script>
  <script src="/templates/clientconsole/assets/js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="/templates/clientconsole/assets/js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="/templates/clientconsole/assets/js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="/templates/clientconsole/assets/js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="/templates/clientconsole/assets/js/autocomplete/countries.js"></script>
  <script src="/templates/clientconsole/assets/js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="/templates/clientconsole/assets/js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>
  <script src="/templates/clientconsole/assets/js/custom.js"></script>


  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->
  <!-- input tags -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /input tags -->
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
</body>

</html>
