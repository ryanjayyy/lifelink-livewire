import React from "react";

function HospitalIcon({ className }) {
  return (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="512"
      height="512"
      viewBox="0 0 512 512"
      className={className}
    >
      <path d="M256 125.872c7.72 0 14-6.28 14-14-.031-5.237-7.316-18.735-14-29.02-6.684 10.284-13.969 23.783-14 29.021 0 7.719 6.28 13.999 14 13.999z"></path>
      <path d="M256 200c55.078 0 100-44.922 100-100S311.078 0 256 0 156 44.922 156 100s44.922 100 100 100zM227.647 71.627c3.502-5.686 7.315-11.254 10.735-15.681 4.068-5.265 9.131-11.817 17.617-11.817s13.549 6.553 17.617 11.817c3.42 4.427 7.233 9.995 10.735 15.681C294.735 88.482 300 102.022 300 111.872c0 24.262-19.738 44-44 44s-44-19.738-44-44c0-9.85 5.265-23.39 15.647-40.245zM380.474 137.515H497c8.284 0 15-6.716 15-15 0-41.355-33.645-75-74.999-75h-62.079c7.116 16.061 11.079 33.818 11.079 52.485 0 13.039-1.938 25.631-5.527 37.515zM15 137.516h116.526A129.599 129.599 0 01126 100c0-18.668 3.963-36.425 11.079-52.485H75c-41.355 0-75 33.646-75 75.001 0 3.979 1.581 7.794 4.394 10.606A14.996 14.996 0 0015 137.516zM271 410h53v102h-53z"></path>
      <path d="M30 306h452V167.515H367.056C344.211 204.954 302.976 230 256 230s-88.21-25.046-111.055-62.485H30zM497 482h-15V336H30v146H15c-8.284 0-15 6.716-15 15s6.716 15 15 15h143V395c0-8.284 6.716-15 15-15h166c8.284 0 15 6.716 15 15v117h143c8.284 0 15-6.716 15-15s-6.716-15-15-15z"></path>
      <path d="M188 410h53v102h-53z"></path>
    </svg>
  );
}

export default HospitalIcon;