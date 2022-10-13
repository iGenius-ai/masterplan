var prevBtns = document.querySelectorAll(".btn-prev");
var nextBtns = document.querySelectorAll(".btn-next");
var progress = document.getElementById("progress");
var formSteps = document.querySelectorAll(".form-step");
var progressSteps = document.querySelectorAll(".progress-step");
var navBar = document.getElementById("navbar-nav");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressBar();
  });
});
prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressBar();
  });
});

function toggler() {
  navBar.classList.toggle("display");
}

function updateFormSteps() {
  formSteps.forEach(formStep => { 
    formStep.classList.contains("form-step-active") == formStep.classList.remove("form-step-active");
  });
  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressBar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  var progressActive = document.querySelectorAll(".progress-step-active");
  progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1) * 100 + "%");
}

(function ($) {

  var counter = function () {
    $('#mp-counter').waypoint(function (direction) {
      if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {
        var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
      }
    }, { offset: '95%' });
  }
  counter();

})(jQuery);