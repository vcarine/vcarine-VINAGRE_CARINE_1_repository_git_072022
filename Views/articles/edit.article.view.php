<div class="m-5 " id="form">
    <div class="container-form text-center ">
        <div id="form-row" class="row justify-content-center align-items-center">
            <form class="form-bloc text-center" method="post" action="<?= URL ?>articles/e/">
                <div class="form-groupe p-3">
                    <label  style="color: #666666; " for="title" ></label>
                    <input class="w-50 mb-2 pb-2 border-bottom border-1"
                           style="border: 0; outline: 0; background : 0; "
                           type="text" required maxlength="16" id="title" placeholder="Titre">
                </div>
                <div class="form-groupe  fw-bold m-2 text-center " >
                            <textarea class="w-50 h-50 border-2 p-3 "
                                      style="; outline: 0; background : #ffffff; resize: none; color : #666666;  border-color: #8b97d7; "
                                      id="txt" cols="45" rows="10"
                                      placeholder ="Votre commentaire"></textarea>
                </div>

                <div class="form-groupe  fw-bold  text-center">
                    <input class=" button-sub hover-overlay  w-auto p-2  border border-2  btn btn-outline-dark rounded-pill align-center"
                           style="border: 0; outline: 0;  color : #f1f1f1 font-size : 18px"
                           type="submit"
                           value="ENVOYER" >
                    <!--                            <a href="">Si connecter droit ajouter </a>-->
                    <!--                            <a href="">Si pas inscrit => inscription </a>-->
                </div>
            </form>
        </div>
    </div>
</div>