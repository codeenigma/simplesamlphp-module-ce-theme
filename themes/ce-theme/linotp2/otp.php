<?php
$this->data['header'] = $this->t('{linotp2:device:authenticate}');
$this->data['autofocus'] = 'otp';

$this->includeAtTemplateBase('includes/header.php');
?>
    <section class="section">
        <a id="main-content" tabindex="-1"></a>
        <div class="region region--content">

            <?php
            if (isset($this->data['error']) && $this->data['error'] !== false) {
                ?>
                <div class="system-messages-wrapper" data-drupal-messages="">
                    <div role="contentinfo" aria-label="Error message" class="error">
                        <div role="alert">
                            <p><strong><?php echo $this->t('{login:error_header}'); ?></strong></p>
                            <h2 class="visually-hidden">Error message</h2>
                            <ul>
                                <li><?php echo htmlspecialchars($this->data['error']); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div id="block-enigma-corporate-content" class="block block-enigma-corporate-content">
                <h2 class="teaser__title"><?php echo $this->t('{linotp2:device:authenticate}'); ?></h2>

                <form action="?" method="post" name="f">
                    <!-- # dictionary bug means we have to hardcode this message.
                <p><?php echo $this->t('{linotp2:otp:intro}'); ?></p> -->
                    <p>In order to complete your login you need to authenticate using a device registered with us.
                        Please enter a valid token from your phone app or if you have a YubiKey press it now.</p>
                    <p>
                    <div class="js-form-item form-item js-form-type-textfield form-item-name js-form-item-name">
                        <input id="otp" type="text" tabindex="2" name="otp"
                               style="border: 1px solid #ccc; background: #eee; padding: .5em; font-size: medium; width: 70%;
                         color: #000" autofocus />
                    </div>
                    <?php
                    foreach ($this->data['params'] as $name => $value) {
                        echo('<input type="hidden" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" />');
                    }
                    ?>
                    <div class="form-actions js-form-wrapper form-wrapper">
                        <button type="submit" class="button js-form-submit form-submit"><?php echo $this->t('{linotp2:otp:submitbutton}'); ?></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="call-to-action">
            <div class="call-to-action">
                <div class="block-get-in-touch">
                    <p>
                        You can use an authenticator phone app such as Google Authenticator or a Code Enigma YubiKey to use this service.<br />
                        If you have never configured a 2FA device for use with Code Enigma services, please visit <a href="https://2fa.codeenigma.net">our 2FA selfservice portal</a> and register your phone app / YubiKey.<br />
                        Note, only <strong>Code Enigma issued</strong> YubiKeys can work at this time. <br />
                        If you are still experiencing difficulties having registered your token, please <a href="https://redmine.codeenigma.net">contact support</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
<?php
$this->includeAtTemplateBase('includes/footer.php');
