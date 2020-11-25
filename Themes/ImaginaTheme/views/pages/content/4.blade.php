<div class="page" data-icontenttype="page" data-icontentid="4">

    @component('partials.widgets.breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">{{$page->title}}</li>
    @endcomponent

    <section class="iblock general-block14" data-blocksrc="general.block14">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12">
                    <div class="title-primary mb-5">
                        <h1 class="text-primary">{{$page->title}}</h1>
                    </div>
                </div>
                <div class="col-lg-11 mb-5">

                    <div class="page-body row">
                        <div class="col-lg-7 mb-5">
                            {!! Forms::render('contacto','iforms::frontend.form.bt-horizontal.form') !!}

                        </div>
                        <div class="col-lg-5 mb-5">

                            <div class="body">

                                <div class="icontenteditable subtitle text-center">
                                    <p>Tenga en cuenta esta informacion en el momento de realizar su solicitud:</p>
                                </div>
                                <div class="icontenteditable text-justify">
                                    <ul>
                                        <li>
                                            <strong>Petición</strong>
                                            Derecho que tiene el Cliente a consultar algún hecho particular sobre el que se
                                            tengan
                                            inquietudes, así como la solicitud de copias de documentos o trámites que lo
                                            involucren
                                        </li>
                                        <li>
                                            <strong>Queja</strong>
                                            Manifestación verbal o escrita de insatisfacción, descontento o inconformidad, hecha
                                            por un cliente
                                            con respecto a una conducta o actuar de un colaborador de la Empresa, o con respecto
                                            al proceso de
                                            tratamiento de PQR.
                                        </li>
                                        <li>
                                            <strong>Reclamo</strong>
                                            Manifestación verbal o escrita hecha por un cliente sobre el incumplimiento o
                                            irregularidad de
                                            alguna de las características de los productos comercializados por la Empresa, o de
                                            los servicios
                                            prestados por ésta.
                                        </li>
                                        <li>
                                            <strong>Sugerencia</strong>
                                            Consejo, recomendación. Formulación de una opinión, o una propuesta de mejora, por
                                            parte del
                                            cliente, con respecto de los productos comercializados y los servicios ofrecidos por
                                            la Empresa.
                                        </li>
                                        <li>
                                            <strong>Felicitación</strong>
                                            Manifestación positiva, por parte del cliente, con respecto de la gestión realizada
                                            por la Empresa o
                                            alguno de sus colaboradores, dejando evidencia de su buen desempeño y atención.
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
        

                    </div>
                </div>



                

            </div>
        </div>
    </section>




</div>














