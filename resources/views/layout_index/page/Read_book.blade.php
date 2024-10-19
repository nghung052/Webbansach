@extends('layout_index.master')
@section('content')
@if($pdf->link)
<style type="text/css">
	body {
  margin: 0;
  font-family: sans-serif;
  font-size: 0.9rem;
}
#app {
  display: flex;
  flex-direction: column;
  height: 90vh;
}
#toolbar {
  display: flex;
  align-items: center;
  background-color: #555;
  color: #fff;
  padding: 0.5em;
}
#toolbar button,
#page-mode input {
  color: currentColor;
  background-color: transparent;
  font: inherit;
  border: 1px solid currentColor;
  border-radius: 3px;
  padding: 0.25em 0.5em;
}
#toolbar button:hover,
#toolbar button:focus,
#page-mode input:hover,
#page-mode input:focus {
  color: lightGreen;
}
#page-mode {
  display: flex;
  align-items: center;
  padding: 0.25em 0.5em;
}
#viewport-container {
  flex: 1;
  background: #eee;
  overflow: auto;
}
#viewport {
  width: 90%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}
#viewport > div {
  text-align: center;
  max-width: 100%;
}
#viewport canvas {
  width: 100%;
  box-shadow: 0 2px 5px gray;
}
</style>
<div class="container">
  <div id="app">
    <div role="toolbar" id="toolbar">
      <div id="pager">
        <button data-pager="prev">Trang Trước</button>
        <button data-pager="next" onclick="addQuantity()" id="btPlay">Trang Sau</button>
      </div>
        <div id="page-mode">
        <label><input type="hidden" min="1" max="8" disabled=""></label>
      </div>
    </div>
    <div id="viewport-container">
      <div role="main" id="viewport" ></div>
    </div>
  </div>
</div>
<br>
<br>
@else
<style type="text/css">
  body {
  margin: 0;
  font-family: sans-serif;
  font-size: 0.9rem;
}
#app {
  display: flex;
  flex-direction: column;
  height: 90vh;
}
#toolbar {
  display: flex;
  align-items: center;
  background-color: #555;
  color: #fff;
  padding: 0.5em;
}
#toolbar button,
#page-mode input {
  color: currentColor;
  background-color: transparent;
  font: inherit;
  border: 1px solid currentColor;
  border-radius: 3px;
  padding: 0.25em 0.5em;
}
#toolbar button:hover,
#toolbar button:focus,
#page-mode input:hover,
#page-mode input:focus {
  color: lightGreen;
}
#page-mode {
  display: flex;
  align-items: center;
  padding: 0.25em 0.5em;
}
#viewport-container {
  flex: 1;
  background: #eee;
  overflow: auto;
}
#viewport {
  width: 90%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}
#viewport > div {
  text-align: center;
  max-width: 100%;
}
#viewport canvas {
  width: 100%;
  box-shadow: 0 2px 5px gray;
}
</style>
<div class="container">
  <div id="app">
    <div role="toolbar" id="toolbar">
      <div id="pager">
        <button data-pager="prev">Trang Trước</button>
        <button data-pager="next" onclick="addQuantity()" id="btPlay">Trang Sau</button>
      </div>
        <div id="page-mode">
        <label><input type="hidden" min="1" max="8" disabled=""></label>
      </div>
    </div>
    <div id="viewport-container">
      <div role="main" id="viewport" > <h2>Không có dữ liệu sách</h2></div>
    </div>
  </div>
</div>
<br>
<br>
@endif
<script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js"></script>
<script type="text/javascript">
  (function() {
    let currentPageIndex = 0;
    let pageMode = 1;
    let cursorIndex = Math.floor(currentPageIndex / pageMode);
    let pdfInstance = null;
    let totalPagesCount = 0;
    const viewport = document.querySelector("#viewport");
    window.initPDFViewer = function(pdfURL) {
      pdfjsLib.getDocument(pdfURL).then(pdf => {
        pdfInstance = pdf;
        totalPagesCount = pdf.numPages;
        initPager();
        initPageMode();
        render();
      });
    };
    function onPagerButtonsClick(event) {
      const action = event.target.getAttribute("data-pager");
      if (action === "prev") {
        if (currentPageIndex === 0) {
          return;
        }
        currentPageIndex -= pageMode;
        if (currentPageIndex < 0) {
          currentPageIndex = 0;
        }
        render();
      }
      if (action === "next") {
        if (currentPageIndex === totalPagesCount - 1) {
          return;
        }
        currentPageIndex += pageMode;
        if (currentPageIndex > totalPagesCount - 1) {
          currentPageIndex = totalPagesCount - 1;
        }
        render();
      }
    }
    function initPager() {
      const pager = document.querySelector("#pager");
      pager.addEventListener("click", onPagerButtonsClick);
      return () => {
        pager.removeEventListener("click", onPagerButtonsClick);
      };
    }
    function onPageModeChange(event) {
      pageMode = Number(event.target.value);
      render();
    }
    function initPageMode() {
      const input = document.querySelector("#page-mode input");
      input.setAttribute("max", totalPagesCount);
      input.addEventListener("change", onPageModeChange);
      return () => {
        input.removeEventListener("change", onPageModeChange);
      };
    }
    function render() {
      cursorIndex = Math.floor(currentPageIndex / pageMode);
      const startPageIndex = cursorIndex * pageMode;
      const endPageIndex =
        startPageIndex + pageMode < totalPagesCount ?
        startPageIndex + pageMode - 1 :
        totalPagesCount - 1;
      const renderPagesPromises = [];
      for (let i = startPageIndex; i <= endPageIndex; i++) {
        renderPagesPromises.push(pdfInstance.getPage(i + 1));
      }
      Promise.all(renderPagesPromises).then(pages => {
        const pagesHTML = `<div style="width: ${
        pageMode > 1 ? "50%" : "100%"
      }"><canvas></canvas></div>`.repeat(pages.length);
        viewport.innerHTML = pagesHTML;
        pages.forEach(renderPage);
      });
    }
    function renderPage(page) {
      let pdfViewport = page.getViewport(1);
      const container =
        viewport.children[page.pageIndex - cursorIndex * pageMode];
      pdfViewport = page.getViewport(container.offsetWidth / pdfViewport.width);
      const canvas = container.children[0];
      const context = canvas.getContext("2d");
      canvas.height = pdfViewport.height;
      canvas.width = pdfViewport.width;
      page.render({
        canvasContext: context,
        viewport: pdfViewport
      });
    }
  })();
</script>

<script>
  initPDFViewer('{{asset("book_pdf/$pdf->link")}}');
</script>

@if(Auth::check())
<script type="text/javascript">
  var toGet = 0;
  function addQuantity() {
    toGet++;
    if (toGet >= 8) {
      document.location = "{{route('detail',$product_detail->id)}}";
      Swal.fire({
        icon: 'info',
        title: 'Mời mua hàng',
        showConfirmButton: false,
        timer: 2000
      })
    }
  }
</script>

@else
<script type="text/javascript">
  var toGet = 0;
  function addQuantity() {
    toGet++;
    if (toGet >= 8) {
      document.location = "{{route('login')}}";
    }
  }
</script>
@endif
@endsection
