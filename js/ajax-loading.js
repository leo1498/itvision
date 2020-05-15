// export default clientFilter;

// function loadNews() {
//    const btn = document.getElementById('load-news');

//    if (btn) {
//       const container = $('#news-ajax');
//       const ajax_url = btn.dataset.ajax;
//       const posts_length = parseInt(btn.dataset.maxpage);
//       const offsetCount = parseInt(btn.dataset.postsperpage);
//       let offset = offsetCount;

//       btn.addEventListener('click', () => {
//          jQuery.ajax({
//             type: 'post',
//             url: ajax_url,
//             data: {
//                action: 'newsLoadAjax',
//                offset: offset,
//                postsPerPage: offsetCount
//             },

//             beforeSend: function() {
//                btn.style.opacity = '0.2';
//             },
//             success: function(response) {
//                offset += offsetCount; 
//                btn.style.opacity = 1;
//                container.append(response);
//                offset >= posts_length && btn.remove();
//             }
//          });
//       })
//    }
// }

function clientFilter() {
   var ajax_url = $('#filter').attr('data-ajax'),
       container = $('#clients-container'),
       pagination = $('#pagination'),
       searchTitle = $('#filterSearch').val(),
       sort = $('#filterSelect option:selected').val();

   jQuery.ajax({
         type: 'post',
         url: ajax_url,
         data: {
         action: 'clientFilter',
         searchTitle: searchTitle,
         sort: sort,
      },
      beforeSend: function() {
         container.addClass('loading');
      },
      success: function(response) {
         container.removeClass('loading');
         pagination.remove();
         container.html(response);  
      }
   });
}

$('#filterSelect').on('change', function() {
   clientFilter();
});

$('#filterSearch').on('keyup', function() {
   clientFilter();
});

$('#filterSearch').on('search', function() {
   clientFilter();
});

$('form input').on('keyup', function() {
   $(this).siblings('.wpcf7-not-valid-tip').addClass('hide');
});

// function loadNewsOld() {
//    const btn = document.getElementById('load-news');
//    const ajax_url = btn.dataset.ajax;
//    const container = document.getElementById('news-ajax');
//    const data = {
//       action: ajax_url + '?action=newsLoadAjax'
//    };
   
//    function ajax() {
//       fetch(ajax_url, {
//          method: 'POST',
//          headers: {
//             'Content-Type': 'application/json'
//          },
//          body: ajax_url + '?action=newsLoadAjax',
//          credentials: 'same-origin',
//       })
//          .then(response => response.json())
//          .then(data => {
//             container.after(data);
//          })
//          .catch(error => console.error('Error:', error));
//    }

//    btn.addEventListener('click', () => {
//       ajax();
//    })
// }