$( function() {
        $( "#name" ).autocomplete({
          source: "{{ url('/products/search') }}"
        });
      } );