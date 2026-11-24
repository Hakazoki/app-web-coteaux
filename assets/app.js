import "./stimulus_bootstrap.js";
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import "./styles/app.css";

const initFomantic = () => {
    $('.ui.dropdown').dropdown();
};
document.addEventListener('turbo:load', initFomantic);
initFomantic();
document.addEventListener("turbo:load", () => {
    $(".ui.dropdown").dropdown();
});

// boutton modal producteur
$("#open-modal-maraicher").on("click", function () {
    $("#mon-modal-maraicher").modal("show");
});

$("#open-modal-fromager").on("click", function () {
    $("#mon-modal-fromager").modal("show");
});

$("#open-modal-boulangere").on("click", function () {
    $("#mon-modal-boulangere").modal("show");
});

$("#open-modal-apicultrice").on("click", function () {
    $("#mon-modal-apicultrice").modal("show");
});

$("#open-modal-volaille").on("click", function () {
    $("#mon-modal-volaille").modal("show");
});

$("#open-modal-jusdepomme").on("click", function () {
    $("#mon-modal-jusdepomme").modal("show");
});

$("#open-modal-vigneron").on("click", function () {
    $("#mon-modal-vigneron").modal("show");
});

$("#open-modal-plante").on("click", function () {
    $("#mon-modal-plante").modal("show");
});
