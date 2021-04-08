
  </body>
</html>
    
<script src="<?=base_url();?>fe_assets/js/jquery-3.6.0.min.js"></script>

<script>
    
    CKEDITOR.replace( 'notes' , {
      width: 850,
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        },
        {
          "name": "about",
          "groups": ["about"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    });

</script>

<script src="<?=base_url();?>fe_assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>fe_assets/js/main.js"></script>
<script src="https://js.stripe.com/v3/"></script>

  
