 {{-- Pnotify javascript --}}
 <script type="text/javascript" src="/node_modules/@pnotify/core/dist/PNotify.js"></script>
 <script type="text/javascript" src="/node_modules/@pnotify/mobile/dist/PNotifyMobile.js"></script>
 <script type="text/javascript" src="/node_modules/@pnotify/confirm/dist/PNotifyConfirm.js"></script>
  
 <script type="text/javascript">

    PNotify.defaultModules.set(PNotifyMobile, {});
    var __stack = new PNotify.Stack({
            dirl: 'down',
            modal:true,
            firstpos1:25,
            overlayClose:false,
            push:'top'     
        });

    var __confirmAction = function(title, text){
            return new Promise(function(resolve, reject){
            var notice = PNotify.notice({
                title: title,
                text: text,
                icons: 'fas fa-question-circle',
                hide: false,
                closer: false,
                sticker: false,
                destory: true,
                stack: __stack,
                modules: new Map([
                    ...PNotify.defaultModules,
                    [
                        PNotifyConfirm, {
                            confirm: true, 
                        }
                    ]
                ])
                // closer: false

            });
            
            notice.on('pnotify:confirm', () => {
            // User confirmed, continue here..
            resolve();
            });
            notice.on('pnotify:cancel', () => {
            // User canceled, continue here...
            reject();
            });
        });
    }

     
</script>