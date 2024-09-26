
//Menu
$(function() {
  $("#navbtn").click(function() {
      $("#resMenu").slideToggle(100);
      $('.hamburger').toggleClass('nav-toggle');
  });
});

//Submenu
jQuery('.menu li > .sub-menu').parent().click(function() {
    var submenu = jQuery(this).children('.sub-menu');
    if ( $(submenu).is(':hidden') ) {
      jQuery(submenu).slideDown(100);
    } else {
      jQuery(submenu).slideUp(100);
    }
  });
//Slider
(function($) {
    "use strict";
     
    jQuery(document).ready(function() {
     
    jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
    nav: true,
    //navText: ['&amp;amp;amp; Next'], //Note, if you are not using Font Awesome in your theme, you can change this to Previous &amp;amp;amp; Next
    responsive:{
            0:{
                items:1,
                //nav:true
            },
            600:{
                items:2,
                //nav:false
            },
            1000:{
                items:3,
                //nav:false
            },
        }
    });
    })
    })(jQuery);
    //Counter
    $(function () {
      var spanTimer = $('.timer');
      spanTimer.each(function () {
        var $timer = jQuery(this);
        $timer.attr('data-count', $timer.text());
      })
    })
    function inviewExample() {
      var $example = jQuery('#inview-example');
      var inview;
 
      if ($example.length) {
        inview = new Waypoint.Inview({
          element: jQuery('#inview-example')[0],
          entered: function(direction) {
            jQuery('.timer').each(function () {
                var $this = jQuery(this);
                var val = jQuery(this).data('count');
                jQuery({ Counter: 0 }).animate({ Counter: val }, {
                  duration: 1000,
                  easing: 'swing',
                  step: function () {
                    $this.text(Math.ceil(this.Counter));
                  }
                });
              });
          }
        })
      }
  }
jQuery(window).on('load', function() {
   inviewExample();
 });
// Adding AOS classes in gallery
$(function () {
  var galleryItem = $('.gallery-item');

  galleryItem.each(function(item) {
    $(this).attr('data-aos', 'flip-left');
    $(this).attr('data-aos-easing', 'ease-out-cubic');
    $(this).attr('data-aos-duration', '2000');
  })
  setTimeout(() => {
    AOS.init();
}, 120);
})
$(function () {
  var sidebarItem = $('.warning-card');
  sidebarItem.each(function(item) {
    $(this).attr('data-aos', "fade-right");
    $(this).attr('data-aos-offset', "300");
    $(this).attr('data-aos-easing', "ease-in-sine");
  })
  setTimeout(() => {
    AOS.init();
}, 120);

})
AOS.init();
// Getting information of meetings with teacher
import meetings from './meetings.json' with {type: 'json'};

const objMeetings = jQuery.parseJSON(JSON.stringify(meetings));
var modalMeetings = $('#modal-meetings');
var modalMeetingsContent = $('.modal-content');

$(function() {
  var meetingsList = $('#meetings');
  meetingsList.on('change', () => {
    displayTeacherMeeting (modalMeetings, modalMeetingsContent);
  })
  
  $(this).on('click', (event) => {
    closeModal(event);
  })
  $.each(objMeetings, (key, values) => {
    var optionText = values['full_name'], optionValue = values['full_name'];
    meetingsList.append(new Option (optionText, optionValue));
  })
})

function closeModal (e) {
  if (e.target == modalMeetings[0] || $(e.target).hasClass('close')) {
    modalMeetings.css('display', 'none');
  }
}

var requiredValues = ['II', 'III', 'IV', 'V'];
function displayTeacherMeeting (modal, modalContent) {
  modal.css('display', 'block');
  var selectedTeacher = $('#meetings option:selected');
  var meetingsTextToDisplay = ' је заказао информативне састанке за родитеље у ';
  var meetingsTextToDisplayTwo = ' У другој смјени састанци се одржавају истим данима у времену  ';
  $.each(objMeetings, (key, values) => {
    if (selectedTeacher.text().toLowerCase() == values['full_name'].toLowerCase()) {
      if (values['visit_termin']) {
        var classOfTeacher = values['class_teacher'].slice(0, -1);
        var containsClass = requiredValues.includes(classOfTeacher);
        var firstReplacementTerminFirst = values['visit_termin'].split(',')[0];
        var firstReplacementTerminSecond = values['visit_termin'].split(',')[1];

        var hours = parseInt((firstReplacementTerminFirst.split(' ')[1]).split(':')[0]) + 5;
        var minutes = parseInt((firstReplacementTerminFirst.split(' ')[1]).split(':')[1]);
        minutes = containsClass ? minutes + 45 : minutes;
        var hoursSecondTermin = parseInt((firstReplacementTerminSecond.split(' ')[2]).split(':')[0]) + 5;//index 2 because off string starting with space
        var minutesSecondTermin = parseInt((firstReplacementTerminSecond.split(' ')[2]).split(':')[1]);
        minutesSecondTermin = containsClass ? minutesSecondTermin + 45 : minutesSecondTermin;// Because of different in Replacement 12:30  13:15
        var secondReplacementTerminFirst = Math.floor((hours * 60 + minutes) / 60);
        var endSecondReplecementTerminFirst = minutes >= 15 ? `${secondReplacementTerminFirst + 1}:${(hours * 60 + minutes + 45) % 60}` : `${secondReplacementTerminFirst}:${(hours * 60 + minutes + 45) % 60}`;

        var secondReplacementTerminSecond = Math.floor((hoursSecondTermin * 60 + minutesSecondTermin) / 60);
        var endSecondReplecementTerminSecond = minutesSecondTermin >= 15 ? `${secondReplacementTerminSecond + 1}:${(hoursSecondTermin * 60 + minutesSecondTermin + 45) % 60}` : `${secondReplacementTerminSecond}:${(hoursSecondTermin * 60 + minutesSecondTermin + 45) % 60}`;

        secondReplacementTerminFirst = `${secondReplacementTerminFirst}:${(hours * 60 + minutes) % 60}`;
        secondReplacementTerminSecond = `${secondReplacementTerminSecond}:${(hoursSecondTermin * 60 + minutesSecondTermin) % 60}`;

        return modalContent.html(
          '<p>' + '<b>'+ values['full_name'] + '</b>' + meetingsTextToDisplay + firstReplacementTerminFirst + " и " + firstReplacementTerminSecond + '</p>' +
          '<p>' + `${meetingsTextToDisplayTwo} ${secondReplacementTerminFirst} - ${endSecondReplecementTerminFirst} и ${secondReplacementTerminSecond} - ${endSecondReplecementTerminSecond}` +'</p>' +
          '<span class="close">x</span>');
      } 
      return modalContent.html('<p>' + '<b>'+ values['full_name'] + '</b>' + meetingsTextToDisplay + 'по завршетку смјене' + '</p>' + '<span class="close">x</span>');
    }
  })
}

var classesArr = ['II', 'III', 'IV', "V", 'VI', 'VII', 'VIII', 'IX'];
var departmentsArr = [1, 2, 3, 4, 5];
// Getting class schedule
import data from './class-schedule.json' with { type: 'json' };

const classOrder = JSON.parse(JSON.stringify(data));
$(function() {
  var schoolClasses = $('#school-class');
  var schoolDepartments = $('#departments');
  var showSchedule = $('#show-schedule');
  var selectedclass, selectedDepartment;
  settingClassOption (classesArr, schoolClasses);
  settingClassOption (departmentsArr, schoolDepartments);
  schoolClasses.on('change', () => {
    selectedclass = $('#school-class option:selected');
  })
  schoolDepartments.on('change', () => {
    selectedDepartment = $('#departments option:selected');
  })

  showSchedule.on('click', () => { 
    $('.modal-content').html('<span class="close">x</span>');
    $('.modal-content').append(classSchedule (selectedclass, selectedDepartment));
  })
})

function settingClassOption (arr, selectElement) {
  $.each(arr, (key, value) => {
    var optionText = value, optionValue = value;
    selectElement.append(new Option(optionText, optionValue));
  })
}

function classSchedule (classes, dep) {
  modalMeetings.css('display', 'block');
  var table = $('<table>');
  var caption = $('<caption>');
  var tHead = $('<thead>');
  var tBody = $('<tbody>');
  caption.append('Распоред часова');
  table.append(caption);

  $.each(classOrder, (key, value) => {
    if (classes.text().toLowerCase() + dep.text().toLowerCase() == Object.values(key).join('').toLowerCase()) {
      var numOfColumn = Object.keys(value).length;
      var numOfRow = Object.values(value).length;
      var trHeader = $('<tr>');
      for (var i = 0; i < numOfColumn; i++) {
        var th = $('<th>').attr('scope', 'col');
        if (Object.keys(value[0])[i] != 'Column1') {
          th.append(Object.keys(value[0])[i]);
        } else {
          th.append('');
        }
        trHeader.append(th);
      }
      tHead.append(trHeader);
      table.append(tHead);
      $.each(value, (prop, propValue) => {
        var tr = $('<tr>');
        for (var j = 0; j < numOfRow; j++) {                        
          var td = $('<td>').attr('data-label', Object.keys(value[0])[j]);
          if (Object.values(propValue)[j] != undefined) {
            td.append(Object.values(propValue)[j]);
          } else {
            td.append('');
          }
          tr.append(td);  
          tBody.append(tr);             
          table.append(tBody);           
        }
      })

    } 
  })

  return table;
}

// Getting test schedule
import schedule from './test-schedule.json' with {type: 'json'};
const testSchedule = JSON.parse(JSON.stringify(schedule));
$(function ()
{
  var schoolClasses = $('#school-class-test');
  var schoolDepartments = $('#departments-test');
  var btnScheduleTest = $('#show-schedule-test');
  var selectedDepartment, selectedclass;

  settingClassOption (classesArr, schoolClasses);
  settingClassOption (departmentsArr, schoolDepartments);

  schoolClasses.on('change', () => {
    selectedclass = $('#school-class-test option:selected').text();
  })
  schoolDepartments.on('change', () => {
    selectedDepartment = $('#departments-test option:selected').text();
  })

  btnScheduleTest.on('click', () => {
    var filteredData = testSchedule.filter((item) => {
      var currentClass = item['class'];
      var razred = selectedclass + selectedDepartment;
      return currentClass == razred;
    });
    displayTestSchedule (filteredData);
  });
})

function displayTestSchedule (arr)
{
  modalMeetings.css('display', 'block');
  modalMeetings.addClass('page');
  modalMeetingsContent.html('<span class="close">x</span>');
  var ul = $('<ul>');
  if (arr.length > 0)
  {
  var liArray = $.map(arr, (value) => {
    var year = [value['termin'].split('-')[0]];
    var month = [value['termin'].split('-')[1]];
    var day = (parseInt([value['termin'].split('-')[2]]) + 4);
    day = day <= 30 ? day : 30;
    var date = `${day}. ${month}. ${year}.`;
    return `<li>${value['test_type']} из предмета <strong>${value['subject']}</strong> у седмици од <strong>${[value['termin'].split('-')[2]]}. ${[value['termin'].split('-')[1]]}. до ${date}</li></strong>`;
  });
  ul.html(liArray.join(''));
  }else
  {
    ul.html('<span>Нема писаних провјера за изабрано одјељење.</span>');
  }
  modalMeetingsContent.append(ul);
}



