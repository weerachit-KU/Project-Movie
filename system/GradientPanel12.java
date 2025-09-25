package system;
import java.awt.*;
import javax.swing.*;

public class GradientPanel12 extends JPanel {

    @Override
    protected void paintComponent(Graphics g) {
        super.paintComponent(g);
        Graphics2D g2 = (Graphics2D) g.create();
        g2.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);
        g2.setRenderingHint(RenderingHints.KEY_RENDERING, RenderingHints.VALUE_RENDER_QUALITY);

        int w = getWidth(), h = getHeight();

        // พื้นดำไล่บาง ๆ
        Color top = new Color(13,13,13);
        Color bottom = new Color(18,16,18);
        g2.setPaint(new GradientPaint(0, 0, top, 0, h, bottom));
        g2.fillRect(0, 0, w, h);

        // แสงเทพื้นแดงทางขวาล่าง
        g2.setPaint(new GradientPaint(w*0.60f, h*0.40f, new Color(130,0,20,80),
                                      w,       h,       new Color(255,0,60,140)));
        g2.fillRect(0, 0, w, h);

        // กลมเรือง ๆ (bokeh glow)
        drawGlow(g2, (int)(w*0.82), (int)(h*0.82), (int)(h*0.65), new Color(255,0,60,120)); // แดง
        drawGlow(g2, (int)(w*0.65), (int)(h*0.72), (int)(h*0.45), new Color(170,0,110,95)); // ม่วงอมแดง

        g2.dispose();
    }

    private void drawGlow(Graphics2D g2, int cx, int cy, int r, Color c) {
        RadialGradientPaint p = new RadialGradientPaint(
            new Point(cx, cy), r,
            new float[]{0f, 1f},
            new Color[]{c, new Color(0,0,0,0)});
        g2.setPaint(p);
        g2.fillOval(cx - r, cy - r, r*2, r*2);
    }
}