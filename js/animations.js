function animations() {
  console.log("animations");
  gsap.registerPlugin(ScrollTrigger);

  var fadeOp = gsap.utils.toArray(".fade-op");

  fadeOp.forEach((fadeOpA) => {
    gsap.from(fadeOpA, {
      y: 50,
      opacity: 0,
      stagger: 1.3,
      scrollTrigger: {
        trigger: fadeOpA,
        start: "top 90%",
        scrub: 0.3,
        end: "top 40%",
      },
    });
  });
}
