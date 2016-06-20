<script id="autor_reg" type="text/x-handlebars-template">
  	<div class="pop-up-auto pop-up {{registr_class}}">
      <h1 class="pop-up-auto-head">{{name}}</h1>
      <p class="pop-up-auto-pref">{{prefix}}</p>
      {{#if fields.length}}
        <form action="#" method="POST" class="pop-up-auto-form js-form">
    			{{#each fields}}
            {{#if this.checkbox}}
              <label class="pop-up-auto-f-l">
                <input type="checkbox" name="{{nameField}}" class="pop-up-auto-f-l-checkbox js-input-form" value="1"/>
                <span class="pop-up-auto-f-l-text-ch">{{name}}</span>
              </label>
            {{else}}
              <label class="pop-up-auto-f-l">
            	  <span class="pop-up-auto-f-l-text">{{name}}</span>
                <input type="{{typeField}}" name="{{nameField}}" class="pop-up-auto-f-l-inp search-form-input js-input-form" {{required}}/>
              </label>
            {{/if}}
          {{/each}}
          {{#if rememberPass}} 
            {{#with rememberPass}}
              <a href="#" class="remember-pass">{{text}}</a>
            {{/with}}
          {{/if}}
          <div class="pop-up-auto-f-l-wr">
            {{#each buttons}}
              <div class="pop-up-auto-f-l-btn">
                <input type="{{type}}" class="{{classes}}" data-button="{{data}}" value="{{value}}" />
              </div>
            {{/each}}
          </div>
        </form>
      {{/if}}
      <a href="#" class="pop-up-close js-close_popup"></a>
    </div>
  </script>
  
  <script id="message" type="text/x-handlebars-template">
    <div class="popup-message pop-up">
      <h1 class="message-header pop-up-auto-head">{{title}}</h1>
      <p class="message-text pop-up-auto-pref">{{message}}</p>
      <a href="#" class="pop-up-close js-close_message"></a>
    </div>
  </script>