(function( $ ) {
    $(function() {
      $('.data').mask('00/00/0000');
      $('.time').mask('00:00:00');
      $('.cx_padrao').mask('00000', {placeholder: "00000"});
      $('.date_time').mask('00/00/0000 00:00:00');
      $('.cep').mask('00000-000', {placeholder: "00000-000"});
      $('.phone').mask('00 0000-0000', {placeholder: "00 0000-0000"});
      $('.phonecall').mask('00 00000-0000', {placeholder: "00 00000-0000"});
      $('.phoneddg').mask('0000 000 0000', {placeholder: "0000 000 0000"});
      $('.phone_with_ddd').mask('(00) 0000-0000');
      $('.phone_us').mask('(000) 000-0000');
      $('.mixed').mask('AAA 000-S0S');
      $('.ip_address').mask('099.099.099.099');
      $('.percent').mask('##0,00%', {reverse: true});
      $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
      $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
      $('.cnpj').mask("00.000.000/0000-00", {placeholder: "00.000.000/0000-00"});
      $('.cpf').mask("000.000.000-00", {placeholder: "000.000.000-00"});
      $('.fallback').mask("00r00r0000", {
        translation: {
          'r': {
            pattern: /[\/]/,
            fallback: '/'
          },
          placeholder: "__/__/____"
        }
      });
  
      $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
  
      $('.cep_with_callback').mask('00000-000', {onComplete: function(cep) {
          console.log('Mask is done!:', cep);
        },
         onKeyPress: function(cep, event, currentField, options){
          console.log('An key was pressed!:', cep, ' event: ', event, 'currentField: ', currentField.attr('class'), ' options: ', options);
        },
        onInvalid: function(val, e, field, invalid, options){
          var error = invalid[0];
          console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
        }
      });
  
      $('.crazy_cep').mask('00000-000', {onKeyPress: function(cep, e, field, options){
        var masks = ['00000-000', '0-00-00-00'];
          mask = (cep.length>7) ? masks[1] : masks[0];
        $('.crazy_cep').mask(mask, options);
      }});
  
      $('.cnp2j').mask('00.000.000/0000-00', {reverse: true});
      $('.cpf2').mask('000.000.000-00', {reverse: true});
      $('.money').mask('#.##0,00', {reverse: true, placeholder: "0,00"});
    
      var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      },
      spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
          }
      };
  
      $('.sp_celphones').mask(SPMaskBehavior, spOptions);
  
      $(".bt-mask-it").click(function(){
        $(".mask-on-div").mask("000.000.000-00");
        $(".mask-on-div").fadeOut(500).fadeIn(500)
      })
  
      $('pre').each(function(i, e) {hljs.highlightBlock(e)});
    });
  })(jQuery);